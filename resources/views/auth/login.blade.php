@extends('FrontEndPage.templateParts.master')

@section('title','Login')

@section('content')


<div class="login-section section py-5">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Login -->
            <div class="col-md-5 col-12 d-flex py-5">
                <div class="login-form text-center">

                    <h3 class="py-5">Login to your account</h3>

                    <!-- Login Form -->
                    <form action="{{route('login')}}" method="post">

                        @csrf

                        <div class="row">
                            <div class="form-group col-12 mb-30 px-5 text-left">
                                <label>Email or Username : </label>
                                <input type="email" name="email" class="form-control form-field" placeholder="Type your username or email address"></div>
                            <div class="form-group col-12 mb-20 px-5 text-left">
                                <label>Password :</label>
                                <input type="password" name="password" class="form-control form-field" placeholder="Enter your password"></div>
                            <div class="form-group col-12 mb-15 px-5 text-left">
                                <input type="checkbox" id="remember_me">
                                <label for="remember_me">Remember me</label>
                            </div>

                            <div class="col-12"><button type="submit" class="login-button">LOGIN</button></div>

                            <div class="col-12">
                                <a href="#">Forgotten password?</a>
                            </div>

                        </div>
                    </form>
                    <span>Don’t have account? please click <a href="{{route('register')}}">Register</a></span>

                </div>
            </div>
        </div>
    </div>
</div><!-- Login Section End -->
@endsection
