@extends('backEnd.templateParts.master')

@section('title','Create Slider')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Slider Items</h2>
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
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create Slider</h5>
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
                        <form role="form" class="form-inline" action="{{route('store_slider')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group" style="width: 100%;">
                                <input type="text" placeholder="Slider Target Name" name="slider_target" id="exampleInputEmail2"
                                       class="form-control" style="width: 100%">
                            </div>

                            <div class="form-group m-t m-b" style="width: 100%;">

                                <input type="file" name="image1" class="form-control" style="width: 100%;">

                            </div>
                            <button class="btn btn-primary m-t" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Slider List <small>all Slider here</small></h5>
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
                                    <th>sl</th>
                                    <th>Image</th>
                                    <th>Target</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl= 0;
                                    @endphp
                                    @foreach($allData as $data)
                                        @php
                                            $sl++;
                                        @endphp
                                        <tr>
                                            <td>{{$sl}}</td>
                                            <td style="text-align: center">
                                                <img src="{{asset('storage/upload/slider_image/'.$data->image)}}" class="img-thumbnail" style="height: 80px; display: inline-block">
                                            </td>
                                            <td>{{$data->slider_target}}</td>
                                            <td>
                                                <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$data->id}}"><i class="fa fa-list"></i>
                                                </button>

                                                <form class="form-inline inline" method="post" action="{{route('SliderItem.destroy',$data->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-warning btn-circle" type="submit"><i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div id="modal-form{{$data->id}}" class="modal fade" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form role="form" class="form-inline" action="{{route('SliderItem.update',$data->id)}}" method="post" enctype="multipart/form-data">

                                                                @method('PATCH')
                                                                @csrf

                                                                <div class="form-group" style="width: 100%;">
                                                                    <input type="text" placeholder="Slider Target Name" name="slider_target" id="exampleInputEmail2" value="{{$data->slider_target}}" class="form-control" style="width: 100%">
                                                                </div>

                                                                <div class="form-group m-t m-b" style="width: 100%;">
                                                                    <input type="file" name="image1" class="form-control" style="width: 100%;">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="img" value="{{$data->image}}">
                                                                </div>
                                                                <button class="btn btn-primary mt-1" type="submit">Add</button>
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
                                    <th>Image</th>
                                    <th>Target</th>
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