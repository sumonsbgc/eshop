@extends('backEnd.templateParts.master')

@section('title','Show Products')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Categories</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Categories</strong>
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
                                    <th>Code</th>
                                    <th>Model No</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
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
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->product_model_no}}</td>
                                        <td>{{$product->product_quantity}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>
                                            <a href="{{route('singleProduct',$product->id)}}"
                                               class="btn btn-primary btn-circle"><i
                                                        class="fa fa-list"></i>
                                            </a>

                                            <form class="form-inline inline" method="post"
                                                  action="{{route('product.destroy',$product->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-warning btn-circle" type="submit"><i
                                                            class="fa fa-times"></i>
                                                </button>
                                            </form>
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
                                    <th>Code</th>
                                    <th>Model No</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
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