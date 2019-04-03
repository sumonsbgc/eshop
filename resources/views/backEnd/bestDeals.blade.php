@extends('backEnd.templateParts.master')


@section('title', 'Best Deals')


@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Best Deals</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Best Deals</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add Best Deals</h5>
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
                        <form role="form" class="form-inline" action="{{route('bestDeals.store')}}" method="post">

                            @csrf

                            <div class="form-group" style="width: 100%;">
                                <label>Start Time</label>
                                <input type="date" name="start_time" id="start_date"
                                       class="form-control" style="width: 100%">

                            </div>
                            <div class="form-group m-t">
                                <label>Hours</label>
                                <select class="form-control" name="hours" id="s_h">
                                    @php

                                        for($hours = 0; $hours<24; $hours++){

                                            if ($hours<10){
                                                echo "<option value='0$hours'>0$hours</option>";
                                            }else{

                                                echo "<option value='$hours'>$hours</option>";

                                            }

                                        }

                                    @endphp
                                </select>

                                <label>Minutes</label>

                                <select class="form-control" name="minute" id="s_m">
                                    @php

                                        for($min = 0; $min<60; $min++){

                                            if ($min<10){
                                                echo "<option value='0$min'>0$min</option>";
                                            }else{

                                                echo "<option value='$min'>$min</option>";

                                            }

                                        }

                                    @endphp
                                </select>

                            </div>

                            <div class="form-group m-t" style="width: 100%;">

                                <label>End Time</label>
                                <input type="date" name="end_time" id="end_date"
                                       class="form-control" style="width: 100%">

                            </div>

                            <div class="form-group m-t">
                                <label>Hours</label>
                                <select class="form-control" name="e_hours" id="e_h">
                                    @php

                                        for($hours = 0; $hours<24; $hours++){

                                            if ($hours<10){
                                                echo "<option value='0$hours'>0$hours</option>";
                                            }else{

                                                echo "<option value='$hours'>$hours</option>";

                                            }

                                        }

                                    @endphp
                                </select>

                                <label>Minutes</label>

                                <select class="form-control" name="e_minute" id="e_m">
                                    @php

                                        for($min = 0; $min<60; $min++){

                                            if ($min<10){
                                                echo "<option value='0$min'>0$min</option>";
                                            }else{

                                                echo "<option value='$min'>$min</option>";

                                            }

                                        }

                                    @endphp
                                </select>

                            </div>

                            <button class="btn btn-primary m-t block" type="button" data-toggle="modal" data-target="#myModal5">Add Product</button>

                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Special Price</th>
                                                        <th>New Discount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @php


                                                        $id =0;

                                                    @endphp



                                                    @foreach($products as $product)
                                                        @php
                                                            $id++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{$id}}</td>
                                                            <td>{{$product->product_name}}</td>
                                                            <td>{{$product->product_quantity}}</td>
                                                            <td>{{$product->product_price}}</td>
                                                            <td>{{$product->product_special_price}}</td>
                                                            <td><input type="number" name="big_discount" id="new_discount{{$product->id}}"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" id="{{$product->id}}" onclick="addFlashSale(this)">Add To Sale</button>
                                                            </td>
                                                        </tr>



                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Special Price</th>
                                                        <th>New Discount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Category List <small>all category here</small></h5>
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
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Special Price</th>
                                    <th>New Discount</th>
                                    <th>Started Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php


                                    $id =0;

                                @endphp



                                @foreach($all_flash_products as $product)
                                    @php
                                        $id++;
                                    @endphp
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_quantity}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>{{$product->product_special_price}}</td>
                                        <td>{{$product->product_discount}}%</td>
                                        <td>{{$product->start_time}}</td>
                                        <td>{{$product->end_time}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$product->id}}"><i class="fa fa-list"></i>
                                            </button>
                                            <form class="form-inline inline" method="post" action="{{route('bestDeals.destroy',$product->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-warning btn-circle" type="submit"><i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div id="modal-form{{$product->id}}" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <form role="form" enctype="multipart/form-data" class="form-inline" action="{{route('bestDeals.update',$product->id)}}" method="post">

                                                            @method('PATCH')
                                                            @csrf

                                                            <div class="form-group" style="width: 100%;">
                                                                <input type="text" placeholder="Category" name="product_discount" value="{{$product->product_discount}}"
                                                                       class="form-control" style="width: 100%">
                                                            </div>

                                                            <button class="btn btn-primary m-t block" type="submit">Add</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Special Price</th>
                                    <th>New Discount</th>
                                    <th>Started Time</th>
                                    <th>End Time</th>
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