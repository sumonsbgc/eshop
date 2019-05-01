@extends('backEnd.templateParts.master')
@section('title','All Posts')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>All Posts</h2>
        </div>
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Posts</h5>
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
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1">Fresh</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2">Trash</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Post Title</th>
                                                    <th>Category</th>
                                                    <th>Author Username</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $id =0;
                                                @endphp
                
                                                @foreach($posts as $post)
                                                    @php
                                                        $id++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{$id}}</td>
                                                        <td>{{$post->title}}</td>
                                                        <td>{{ucwords(str_replace('_', ' ', $post->post_category))}}</td>
                                                        <td>{{ App\Admin::find($post->author_id)->username }}</td>
                                                        <td>
                                                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-circle">
                                                                <i class="fa fa-list"></i>
                                                            </a>
                                                            <form class="form-inline inline" method="post" action="{{route('posts.destroy',$post->id)}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-warning btn-circle" type="submit">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Post Title</th>
                                                    <th>Category</th>
                                                    <th>Author Username</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Trash Id</th>
                                                    <th>Trash Post Title</th>
                                                    <th>Trash Post Category</th>
                                                    <th>Trash Post Author Username</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $id =0;
                                                @endphp
                                                
                                                @foreach(getAllTrashPosts() as $trash)
                                                    @php
                                                        $id++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{$id}}</td>
                                                        <td>{{$trash->title.' Trash'}}</td>
                                                        <td>{{ucwords(str_replace('_', ' ', $trash->post_category.' Trash'))}}</td>
                                                        <td>{{ App\Admin::find($trash->author_id)->username.' Trash' }}</td>
                                                        <td>
                                                            <a href="{{ route('posts.edit',$trash->id) }}" class="btn btn-primary btn-circle">
                                                                <i class="fa fa-list"></i>
                                                            </a>
                                                            <form class="form-inline inline" method="post" action="{{route('posts.destroy',$trash->id)}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-warning btn-circle" type="submit">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Post Title</th>
                                                    <th>Category</th>
                                                    <th>Author Username</th>
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
                </div>
            </div>
        </div>
    </div>
@endsection