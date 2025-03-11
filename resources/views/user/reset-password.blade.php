@extends('layouts.main') 

@section('title', 'Verify email')

@section('content')

<div class="row">
<div class="col-md-6 offset-md-3">
        <h2>Reset password</h2>
            
						

						<form method="post" action="{{route('password.update')}}">
						@csrf
            <!-- скрытое поле для токена -->
						<input type="hidden" name="token" value="{{$token}}">
            <div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder='Email' value = "{{old('email')}}">
							@error('email')
                     <div class="invalid-feedback">{{$message}}</div>
            	@enderror    
            </div>

						<div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    <div class="invalid-feedback">
                     <ul>
                        @foreach ($errors->get('password') as $message) 
                           <li>{{ $message }}</li>                                      
                  			@endforeach
                  		</ul>
                   </div>               
            </div>

            <div class="mb-3">
                <label for="pass_confirm" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="pass_confirm">
            </div>

						<button type="submit" class="btn btn-primary">Resset</button>
            
        </form>
    </div>
		</div>
@endsection