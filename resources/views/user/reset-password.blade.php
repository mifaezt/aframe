@extends('layouts.main') 

@section('title', 'Verify email')

@section('content')

<div class="container">
  <div class="form-container">
          <h2>Восстановление праоля</h2>
              
              

              <form method="post" action="{{route('password.update')}}">
              @csrf
              <!-- скрытое поле для токена -->
              <input type="hidden" name="token" value="{{$token}}">
              <div class="form-group">
                <label for="email" class="form-label">Почта</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder='Email' value = "{{old('email')}}">
                @error('email')
                      <div class="invalid-feedback">{{$message}}</div>
                @enderror    
              </div>

              <div class="form-group">
                  <label for="password" class="form-label">Пароль</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                      <div class="invalid-feedback">
                      <ul>
                          @foreach ($errors->get('password') as $message) 
                            <li>{{ $message }}</li>                                      
                          @endforeach
                        </ul>
                    </div>               
              </div>

              <div class="form-group">
                  <label for="pass_confirm" class="form-label">Повторить пароль</label>
                  <input type="password" name="password_confirmation" class="form-control" id="pass_confirm">
              </div>

              <button type="submit" class="btnPricing">Сохранить</button>
              
          </form>
      </div>
		</div>
@endsection