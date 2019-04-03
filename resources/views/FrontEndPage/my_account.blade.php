@extends('FrontEndPage.templateParts.master')

@section('title','My Account')

@section('content')

    <div class="myAccount my-3">

        <div class="container">
            <div class="row" id="tabs">
                <div class="col-lg-3">
                    <div class="accountSidebar">
                        <div class="accountSidebarHeading text-center">
                            <h4>Hello {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
                        </div>
                        <div class="SidebarItems">
                            <h3 class="my-3">Manage Account</h3>
                            <ul id="account-options">
                                <li><a href="#tab-1">Edit Profile</a></li>
                                <li><a href="#tab-2">Address Book</a></li>
                                <li><a href="#tab-3">Wishlist</a></li>
                                <li><a href="#tab-4">My Orders</a></li>
                                <li><a href="#tab-5">My Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div id="tab-1" class="EditProfile edit-box">

                        <h2>Edit Profile</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Birth Day Date</label>
                                        <input type="date" class="form-control" name="birthday_date" value="{{$user->birthday_date}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option @if($user->gender =="male") {{"selected"}} @endif value="male" >Male</option>
                                            <option @if($user->gender =="female") {{"selected"}} @endif value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div id="tab-2" class="AddressBook edit-box">

                        <h2>Address Book</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Region</label>
                                        <input type="text" class="form-control" name="region" value="{{$user->region}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{$user->city}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <input type="text" class="form-control" name="area" value="{{$user->area}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div id="tab-3" class="EditProfile edit-box">

                        <h2>Edit Profile</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Birth Day Date</label>
                                        <input type="date" class="form-control" name="birthday_date" value="{{$user->birthday_date}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option @if($user->gender =="male") {{"selected"}} @endif value="male" >Male</option>
                                            <option @if($user->gender =="female") {{"selected"}} @endif value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div id="tab-4" class="EditProfile edit-box">

                        <h2>Edit Profile</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Birth Day Date</label>
                                        <input type="date" class="form-control" name="birthday_date" value="{{$user->birthday_date}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option @if($user->gender =="male") {{"selected"}} @endif value="male" >Male</option>
                                            <option @if($user->gender =="female") {{"selected"}} @endif value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div id="tab-5" class="EditProfile edit-box">

                        <h2>Edit Profile</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Birth Day Date</label>
                                        <input type="date" class="form-control" name="birthday_date" value="{{$user->birthday_date}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option @if($user->gender =="male") {{"selected"}} @endif value="male" >Male</option>
                                            <option @if($user->gender =="female") {{"selected"}} @endif value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection

@section('scripts')

    <script>
        (function($) {
            $(document).ready(function () {
                $("#tabs").tabs();
            });
        })(jQuery);
    </script>

    @endsection