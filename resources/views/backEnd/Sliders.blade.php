@extends('backEnd.templateParts.master')

@section('title','Slider')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Slider Items</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Slider Items</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Product List </h5>
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
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Special Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php


                                    $id =0;

                                @endphp



                                @foreach($all as $product)
                                    @php
                                        $id++;
                                    @endphp
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->cat_name}}</td>
                                        <td>{{$product->brand_name}}</td>
                                        <td>{{$product->product_quantity}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>{{$product->product_special_price}}</td>
                                        <td>
                                            @php

                                                $a= \Illuminate\Support\Facades\DB::table('sliders')
                                                    ->where('product_id','=',$product->id)->first();


                                            @endphp
                                            <button type="button" class="btn btn-primary" id="{{$product->id}}"

                                                    @if($a != null)

                                                        disabled

                                                    @endif


                                                    onclick="addToSlider(this)">Add To Slider</button>
                                        </td>
                                    </tr>



                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Special Price</th>
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