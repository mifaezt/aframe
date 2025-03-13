@extends('layouts.main') 

@section('title', 'Verify email')

@section('content')
    <div class = "container">
        <div class="form-container">
            <h2>Восстановление пароля </h2>

            <form method="post" action="{{route('password.email')}}">
                @csrf
                <div class="form-group">
                    
                    <label for="email" class="form-label">Почта</label>

                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                    id="email" aria-describedby="emailHelp" placeholder="Почта" value="{{ old('email') }}">
                    <div id="emailHelp" class="form-text">Если столкнулись с проблемами, обращайтесь к нам см. раздел <a href="{{ route('home') }}#contacts" class="admin-panel-button">Контакты</a></div>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btnPricing">Отправить</button>
                </div>
                
                
            </form>
        </div>
   </div>
@endsection