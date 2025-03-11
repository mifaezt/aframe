@extends('layouts.main') 

@section('title', 'Verify email')

@section('content')
    <div class = "container">
        <div class="col-md-6 offset-md-3">
            <h2>Восстановление пароля </h2>

        <form method="post" action="{{route('password.email')}}">
            @csrf
            <div class="mb-3">
                
                <label for="email" class="form-label">Почта</label>

                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                id="email" aria-describedby="emailHelp" placeholder="Почта" value="{{ old('email') }}">
                <div id="emailHelp" class="form-text">Если столкнулись с проблемами, обращайтесь к нам см. раздел Контакты</div>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Отправить</button>
            <!-- 22  если удже зарег-->
            <a href="{{route('login')}}">Уже зарегистрированы?</a>
            </div>
            
            
        </form>
        </div>
   </div>
@endsection