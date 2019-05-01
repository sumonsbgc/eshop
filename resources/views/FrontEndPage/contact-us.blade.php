@extends('FrontEndPage.templateParts.master')
@section("title", "| Contact Us")


@section('content')
<div class="container py-sm-5 py-3">
    <div class="row">

        <div class="col-sm-7 text-center mb-5">
            <h2>Contact Us</h2>
            <h5>Contact Information</h5>
        </div>
        <div class="col-sm-7">
            @if(Session::has('success'))
                <div class="alert alert-success mb-5">
                    {{ Session::get('success') }}
                </div>
            @endif            
                <form method="post" action="{{ route('contactcreate') }}">
                    @csrf
                    <div class="form-group">
                        <label for="fname">Your Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="fname">Mobile No</label>
                        <input type="tel" class="form-control" name="mobile" id="mobile_no" placeholder="Enter Mobile No" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Your Message</label>
                        <textarea class="form-control" rows="3" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        <div class="col-sm-5">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Help Centre</h4>
                </div>
                <div class="card-body">
                    <strong> Dada Bangla Limited</strong><br>
                    <p>
                        <i class="fas fa-home"></i>  Address: House-01, Road-27/A, Rupnagar Commercial Area, Mirpur, Dhaka-1216 Dhaka, Bangladesh
                    </p>
                    <p>
                        <i class="fas fa-phone"></i> Phone: +8801616408873
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i> Email: support@pickaboo.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection