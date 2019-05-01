@extends('backEnd.templateParts.master')

@section('title','Approve Order')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Orders</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Order List</strong>
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
                        <h5>Order List </h5>
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
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Mobile No</th>
                                    <th>Address</th>
                                    <th>Shipping Method</th>
                                    <th>Payment</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php


                                    $id =0;

                                @endphp
                                @foreach($all_in as $item)
                                    @php $id++ @endphp
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->shipping_address}}</td>
                                        <td>{{$item->shipping_method}}</td>
                                        <td>{{$item->payment_option}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td><button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$id}}"><i class="fa fa-list"></i>
                                            </button></td>

                                        <div id="modal-form{{$id}}" class="modal fade" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="gridSystemModalLabel">Order List</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="custom-table p-1">

                                                            <div class="row">
                                                                <div class="col-xs-3 col-lg-3 t-head align-self-center">
                                                                    <p>Product Name</p>
                                                                </div>
                                                                <div class="col-xs-3 col-lg-3 t-head align-self-center">
                                                                    <p>Quantity </p>
                                                                </div>
                                                                <div class="col-xs-3 col-lg-3 t-head align-self-center">
                                                                    <p>Color</p>
                                                                </div>
                                                                <div class="col-xs-3 col-lg-3 t-head align-self-center">
                                                                    <p>Size</p>
                                                                </div>
                                                            </div>

                                                            @php
                                                                $time =$item->created_at;
                                                                $userId = $item->user_id;

                                                                $products = get_customer_order($item->created_at,$item->user_id);

                                                            @endphp

                                                            @foreach($products as $product)

                                                                <div class="row">
                                                                    <div class="col-xs-3 col-lg-3 t-c">
                                                                        {{$product->product_name}}
                                                                    </div>
                                                                    <div class="col-xs-3 col-lg-3 t-c">
                                                                        {{$product->product_quantity}}
                                                                    </div>
                                                                    <div class="col-xs-3 col-lg-3 t-c">
                                                                        {{$product->product_color}}
                                                                    </div>
                                                                    <div class="col-xs-3 col-lg-3 t-c">
                                                                        {{$product->product_size}}
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                            <div class="row">
                                                                <div class=" col-lg-offset-7 col-lg-5 t-c total-payment">
                                                                    Total : {{$item->total_payment}}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Mobile No</th>
                                    <th>Address</th>
                                    <th>Shipping Method</th>
                                    <th>Payment</th>
                                    <th>Order Date</th>
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