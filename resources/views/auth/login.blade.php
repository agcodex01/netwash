@extends('layouts.app')
@section('title', 'Netwash | Login')
@section('nav')
    @include('navigation.welcome')
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!-- Material form login -->
            <div class="card">

                    <h5 class="card-header indigo white-text text-center py-4">
                    <strong>Netwash | Sign in</strong>
                    </h5>
                
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-4">
                
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="md-form">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required >
                            <label for="email">E-mail</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-around pt-3">
                            <div>
                                <!-- Remember me -->
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                            </div>
                            <div>
                            
                                <!-- Forgot password -->
                                @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif
                            </div>
                        </div>
                
                        <!-- Sign in button -->
                        <button class="btn  btn-outline-indigo btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
                
                        <!-- Register -->
                        <p>Not a member?
                        <a href="{{url('/register')}}">Register</a>
                        </p>
                
                        <!-- Social login -->
                        <p>or sign in with:</p>
                        <a type="button" class="btn-floating btn-fb btn-sm">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                        <a type="button" class="btn-floating btn-tw btn-sm">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a type="button" class="btn-floating btn-li btn-sm">
                        <i class="fab fa-google"></i>
                        </a>
                        <a type="button" class="btn-floating btn-git btn-sm">
                        <i class="fab fa-github"></i>
                        </a>
                
                    </form>
                    <!-- Form -->
                
                    </div>
                
                </div>
      <!-- Material form login -->
        </div>
    </div>
</div>


@endsection
