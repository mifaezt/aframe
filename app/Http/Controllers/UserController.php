<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Вид "О нас"
    public function about() {
        return view('about');
    }

    // Вид "Дом внутри"
    public function inside() {
        return view('inside');
    }

    // Правила
    public function aframeRules() {
        return view('aframeRules');
    }

    // Вид "Дом снаружи"
    public function outside() {
        return view('outside');
    }

    // Вид регистрации
    public function create() {
        return view('user.create');
    }

    // Вид логина
    public function login() {
        return view('user.login'); 
    }

    // Вид личного кабинета
    public function userCabinet() {
        // Проверка, подтвержден ли email
        if (Auth::user()->hasVerifiedEmail()) {
            return view('user.userCabinet');
        } else {
            return redirect()->route('verification.notice')->with('warning', 'Пожалуйста, подтвердите ваш email.');
        }
    }

    // Логаут
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Регистрация пользователя
    public function store(Request $request) {
        // Валидация при отправке формы
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        // Создаем пользователя
        $user = User::create($request->all());

        // Создаем событие регистрации
        event(new Registered($user));

         // Отправляем письмо верефикации
        $user->sendEmailVerificationNotification();

        // автоматический логин после регистрации
        Auth::login($user);

        // Перенаправляем на страницу с уведомлением о необходимости подтверждения email
        return redirect()->route('verification.notice')->with('success', 'Регистрация прошла успешно. Пожалуйста, подтвердите ваш email.');
    }

    // Запрос на сброс пароля
    public function forgotPasswordStore(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['success' => __($status)])
                    : back()->withErrors(['email' => __($status)]);   
    }

    // Авторизация пользователя
    public function loginAuth(Request $request) {
        // Валидация
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Попытка авторизации
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
    
            // Проверка, подтвержден ли email
            if (Auth::user()->hasVerifiedEmail()) {
                // Перенаправляем на intended URL или на 'userCabinet'
                return redirect()->intended('userCabinet')->with('success', 'Добро пожаловать, ' . Auth::user()->name . '!');
            } else {
                // Если email не подтвержден, перенаправляем на страницу с уведомлением
                return redirect()->route('verification.notice')->with('warning', 'Пожалуйста, подтвердите ваш email.');
            }
        }
    
        // Если авторизация не удалась
        return back()->withErrors([
            'email' => 'Неверный логин или пароль',
        ]);
    }

    // Сброс пароля
    public function resetPasswordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}