@extends('backEnd.templateParts.master')
@section('title','All Pages')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>All Pages</h2>
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
                        <h5>All Pages</h5>
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
                                    <th>Post Title</th>
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
                                        <td>{{ App\Admin::find($post->author_id)->username }}</td>
                                        <td>
                                            <a href="{{ route('pages.edit',$post->id) }}" class="btn btn-primary btn-circle">
                                              <i class="fa fa-list"></i>
                                            </a>
                                            <form class="form-inline inline" method="post" action="{{route('pages.destroy',$post->id)}}">
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
@endsection