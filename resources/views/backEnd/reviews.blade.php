@extends('backEnd.templateParts.master')
@section('title','Show Products')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>All Reviews</h2>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Reviews </h5>
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
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Reviews</th>
                                        <th>Ratings</th>
                                        <th>Reviewed At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id =0;
                                @endphp

                                @foreach($reviews as $review)
                                    @php
                                        $id++;
                                    @endphp
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{ App\User::find($review->user_id)->name }}</td>
                                        <td>{{$review->review}}</td>
                                        <td>                                            
                                            <div class="starts">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($i <= $review->rating)
                                                    <a class="star fullStar" title="{{$i}}"></a>
                                                    @else
                                                    <a class="star" title="{{$i}}"></a>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>{{ date('d F, Y H:i:s', strtotime($review->created_at)) }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-reply-form{{$review->id}}">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$review->id}}">
                                                <i class="fa fa-list"></i>
                                            </button>
                                            <form class="form-inline inline" method="post" action="{{route('product.destroy', $review->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-warning btn-circle" type="submit">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                        <div id="modal-reply-form{{$review->id}}" class="modal fade" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">Replying Reviewers Review</div>
                                                                    <div class="panel-body">
                                                                        <form action="">
                                                                            <div class="form-group">
                                                                                <textarea name="review_answer" id="" cols="30" rows="10">{{old('review_answer')}}</textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-default">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="modal-form{{$review->id}}" class="modal fade" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 mb-3">
                                                                <h2 class="text-center"><strong>Reviewer Information</strong></h2>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Name: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['name']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Username: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['username']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Gender: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['gender']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Email: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['email']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Phone: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['phone']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Address: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['address']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">Area: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['area']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">City: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['city']}}</strong></div>
                                                                    </li>
                                                                    <li class="list-group-item clearfix">
                                                                        <div class="pull-left">District: </div>
                                                                        <div class="pull-right"><strong>{{getUserInfo($review->user_id)['region']}}</strong></div>
                                                                    </li>
                                                                </ul>
                                                            </div>                                                                                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Reviews</th>
                                        <th>Ratings</th>
                                        <th>Reviewed At</th>
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