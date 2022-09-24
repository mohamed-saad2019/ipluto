@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
    <div class="login">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="logoLogin">
          <img src="{{url('/images/logo.jpeg')}}" alt="" />
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" autofocus
            name="email" 
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
          />
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small
          >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input
            type="password"
            class="form-control  @error('password') is-invalid @enderror"
            id="exampleInputPassword1"
            name="password" required autocomplete="current-password"
          />
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group form-check d-flex justify-content-between">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          <label class="form-check-label" for="exampleCheck1"
            >Check me out</label
          >
          @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
 
@endsection