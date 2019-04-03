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
                        <h5>All Slider Image </h5>
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
                                    <th>Product Id</th>
                                    <th>Caption</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php


                                    $id =0;

                                @endphp



                                @foreach($allData as $product)
                                    @php
                                        $id++;
                                    @endphp
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{$product->product_id}}</td>
                                        <td>{{$product->caption}}</td>
                                        <td>{{$product->discount}}</td>
                                        <td>{{$product->image}}</td>
                                        <td>
                                            <form class="form-inline inline" method="post" action="{{route('SliderItem.destroy',$product->id)}}">
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
                                    <th>Id</th>
                                    <th>Product Id</th>
                                    <th>Caption</th>
                                    <th>Discount</th>
                                    <th>Image</th>
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