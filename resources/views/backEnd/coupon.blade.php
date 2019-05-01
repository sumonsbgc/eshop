@extends('backEnd.templateParts.master')

@section('title', 'Coupon')

@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Coupons</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/admin')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Coupon</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Coupon form <small>add coupon here</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                
                                @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @php
                                                $id=0;
                                                @endphp
                                                @foreach ($errors->all() as $error)
                                                @php
                                                $id++;
                                                @endphp
                                                    <li>{{$id}}.{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                
                                <form role="form" class="form-inline" action="{{route('add_coupon')}}" method="post">

                                    @csrf

                                    <div class="form-group" style="width: 100%;">
                                        <label class="m-t">Coupon</label>
                                        <input type="text" placeholder="Coupon" name="coupon" id="exampleInputEmail2"
                                               class="form-control" style="width: 100%">
                                    </div>

                                    <div class="form-group" style="width: 100%;">
                                        <label class="m-t">Coupon Type</label>
                                        <select class="form-control m-b" style="width: 100%;" onchange="change_coupon_type(this)">
                                            <option value="">Select Coupon Type</option>
                                            <option value="c-1">Percent Discount</option>
                                            <option value="c-2">Fixed Product Discount</option>
                                            <option value="c-3">Fixed Cart Discount</option>
                                        </select>
                                    </div>
                                    <div class="discount-percentage" id="discount-percentage">
                                        <div class="form-group " style="width: 100%;">
                                            <label>Percent Discount</label>
                                            <input type="text" name="percent_discount" placeholder="...%" class="form-control m-b" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="fixed-product-discount" id="fixed-product-discount">

                                        <div class="form-group " style="width: 100%;">
                                            <label>Fixed Product Discount</label>
                                            <input type="text" name="fixed_product_discount" placeholder="amount" class="form-control m-b" style="width: 100%;">
                                        </div>

                                    </div>

                                    <div class="fixed-cart-discount" id="fixed-cart-discount">
                                        <div class="form-group " style="width: 100%;">
                                            <label>Fixed Cart Discount</label>
                                            <input type="text" name="fixed_cart_discount" placeholder="amount" class="form-control m-b" style="width: 100%;">
                                        </div>
                                        <div class="form-group " style="width: 100%;">
                                            <label>Minimum Cart Range</label>
                                            <input type="text" name="min_cart_range" placeholder="amount" class="form-control m-b" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div id="select_product_id">
                                        <div class="form-group m-b" style="width: 100%;">
                                            <label>Select Product</label>
                                            <select class="select2_demo_3 form-control m-b" name="product_id" style="width: 100%;">
                                                <option></option>
                                                @foreach($all as $one)
                                                    <option value="{{$one->id}}">{{$one->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" style="width: 100%">
                                        <label>Expire Date</label>
                                        <input type="date" name="expire_date" placeholder="amount" class="form-control m-b" style="width: 100%;">
                                    </div>

                                    <button class="btn btn-primary m-t" type="submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Coupon List <small>all coupon here</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Coupon</th>
                                    <th>Percent Discount</th>
                                    <th>Product Discount</th>
                                    <th>Cart Discount</th>
                                    <th>Product Name</th>
                                    <th>Cart Range</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i =0; @endphp
                                @foreach($allCoupon as $coupon)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$coupon->coupon}}</td>
                                        <td>{{$coupon->percent_discount}}</td>
                                        <td>{{$coupon->fixed_product_discount}}</td>
                                        <td>{{$coupon->fixed_cart_discount}}</td>
                                        <td>{{$coupon->product_name}}</td>
                                        <td>{{$coupon->min_cart_range}}</td>
                                        <td>
                                            @php

                                                $date = date_create($coupon->expire_date);

                                                echo date_format($date,'d-M-Y');

                                            @endphp

                                        </td>
                                        <td>
                                            <form class="form-inline inline" method="post" action="{{route('delete_coupon',$coupon->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-warning btn-circle" type="submit"><i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Coupon</th>
                                    <th>Percent Discount</th>
                                    <th>Product Discount</th>
                                    <th>Cart Discount</th>
                                    <th>Product Name</th>
                                    <th>Cart Range</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection

