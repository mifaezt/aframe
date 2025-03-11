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
    //Вид онас
    public function about() {
        return view('about');
    }

    // Вид дом внутри
    public function inside() {
        return view('inside');
    }

    // Правила
    public function aframeRules() {
        return view('aframeRules');
    }

    // Вид Дом снаружи
    public function outside() {
        return view('outside');
    }

    //Вид регистрации
    public function create() {
        return view('user.create');
    }

    //Вид логина
    public function login() {
        return view('user.login'); 
    }

        //Вид кабинет 
    public function userCabinet() {
        return view('user.userCabinet');
    }

    
    // логаут
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    //User
    public function store(Request $request ) {
        // Валидация при отправке формы
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        //создаем пользователя
       $user = User::create($request->all());
        // Создаем событие регистрации
       event(new Registered($user));
        // Логиним юзера
        Auth::login($user);
        // dd($request->all());
        return redirect()->route('verification.notice')->with('success', 'Регистрация прошла успешно');
    }

        // Функция, где мы проверяем адрес элпочты и отправляем запрос на сброс пароля пользователю
        public function forgotPasswordStore(Request $request) {
        
            $request->validate(['email' => 'required|email']);
        
            $status = Password::sendResetLink(
                $request->only('email')
            );
        
            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['success' => __($status)])
                        : back()->withErrors(['email' => __($status)]);   
        
        }

        public function loginAuth(Request $request) {
            // Валидация 
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required',],
                ]);
            //    Запуск сессии при успшной аут проверки
            if (Auth::attempt($credentials,$request->boolean('remember') )) {
                $request->session()->regenerate();
                // перенаправляемся в кабинет
                return redirect()->intended('userCabinet')->with('success', 'Добро пожаловать, ' . Auth::user()->name . '!');
            }

             // если ошибка
            return back()->withErrors([
                'email' => 'Неверный логин или пароль',
            ]);

    // dump($request->boolean('remember'));
    // dd($request->all());
}

// Функция сброса пароля из документации
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
