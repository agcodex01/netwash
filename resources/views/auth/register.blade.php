@extends('layouts.app')
@section('title','Netwash | Register')
@section('nav')
    @include('navigation.welcome')
@endsection
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h5 class="card-header indigo white-text text-center py-4">
                    <strong>Netwash | Register</strong>
                </h5>

                <div class="card-body px-lg-5 pt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="md-form">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                            <label for="name">Fullname</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>

               
                        <div class="md-form">
                            <label for="email" >E-mail Address</label>

                      
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>

                        <div class="md-form">
                            <label for="username" >Username</label>

                            
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>

                        
                      


                        <div class="md-form">
                            <label for="password" >Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                            <small id="emailHelp" class="form-text text-muted">Password must be atleast 8 characters</small>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>

                        <div class="md-form">
                            <label for="password-confirm" >Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                          
                        </div>

                        <button class="btn  btn-outline-indigo btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
