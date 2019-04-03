@extends('backEnd.templateParts.master')


@section('title','Featured Items')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Items</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Featured Items</strong>
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
                        <h5>Add Brand </h5>
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
                        <form role="form" class="form-inline" action="{{route('featuredItems.store')}}" method="post">

                            @csrf

                            <div class="form-group m-t" style="width: 100%">
                                <label>Select Category</label>
                                <select style="width: 100%" class="form-control" name="category_id" id="product_category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary m-t block" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Item List </h5>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($items as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->cat_name}}</td>

                                        <td>
                                            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$item->id}}"><i class="fa fa-list"></i>
                                            </button>
                                            <button class="btn btn-success btn-circle" type="button"><i class="fa fa-link"></i>
                                            </button>

                                            <form class="form-inline inline" method="post" action="{{route('featuredItems.destroy',$item->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-warning btn-circle" type="submit"><i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div id="modal-form{{$item->id}}" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <form role="form" enctype="multipart/form-data" class="form-inline" action="{{route('featuredItems.update',$item->id)}}" method="post">

                                                            @method('PATCH')
                                                            @csrf

                                                            <div class="form-group" style="width: 100%;">
                                                                <label>Select Category</label>
                                                                <select style="width: 100%" class="form-control" name="category_id" id="product_category">
                                                                    @foreach($categories as $category)
                                                                        <option
                                                                        @if($category->id == $item->category_id) selected @endif
                                                                        value="{{$category->id}}"
                                                                        >{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>

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
                                    <th>Name</th>
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