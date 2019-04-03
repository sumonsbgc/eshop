@extends('FrontEndPage.templateParts.master')

@section('title','Register')

@section('content')


    <div class="login-section section py-5">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Login -->
                <div class="col-md-6 col-12 d-flex py-5">
                    <div class="login-form text-center px-3">

                        <h3 class="py-5">Register To Our Shop</h3>


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Login Form -->
                        <form action="{{route('register')}}" method="post">

                            @csrf

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-12 mb-30 text-left">
                                    <label>Name : </label>
                                    <input type="text" name="name" class="form-control form-field" placeholder="Type your first name">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12 mb-30 text-left">
                                    <label>Username : </label>
                                    <input type="text" name="username" class="form-control form-field" placeholder="Type your last name">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12 mb-30 text-left">
                                    <label>Email : </label>
                                    <input type="email" name="email" class="form-control form-field" placeholder="Type your email address">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12 mb-30 text-left">
                                    <label>Mobile No : </label>
                                    <input type="text" name="phone" class="form-control form-field" placeholder="">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12 mb-20 text-left">
                                    <label>Password :</label>
                                    <input type="password" name="password" class="form-control form-field" placeholder="Enter your password">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-12 mb-20 text-left">
                                    <label>Confirm Password :</label>
                                    <input type="password" name="confirm_password" class="form-control form-field" placeholder="Confirm your password">
                                </div>

                                <div class="col-12 py-5">
                                    <button type="submit" class="login-button">Register</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- Login Section End -->
@endsection
