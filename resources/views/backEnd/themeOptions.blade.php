@php
    $logo =  isset($all->logo) ? $all->logo : null;
    $shippings = isset($all->shipping_charge) ? unserialize($all->shipping_charge) : null;
    $disticts = [
        'chittagong' => 'Chittagong',
        'comilla' => "Comilla"
    ];
@endphp

@extends('backEnd.templateParts.master')

@section('title','Show Products')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Theme Options</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Theme Options</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">

                <form action="{{route('themeOptions.store')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- Logo Details--}}
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Logo Option </h5>
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
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="pass">Logo</label>
                                    <br>
                                    <input type="file" name="logo" onchange="readURL(this);"
                                           accept="image/gif, image/jpeg, image/jpg, image/png"
                                           class="form-control">
                                </div>
                                <div class="col-sm-7">
                                    @if($logo != null)
                                        <img src="{{asset("themeoption/$logo")}}" id="blah" alt="Logo"
                                             class="img-fluid"
                                             width="400" height="300">
                                    @else
                                        <img src="#" id="blah" alt="Logo"
                                             class="img-fluid" onchange="readURL(this)"
                                             width="400" height="300">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Shipping Details --}}
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Shipping Option </h5>
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
                            <div class="repeater-default">

                                @if($shippings != null)
                                    @foreach($shippings as $shipping)

                                        <div data-repeater-list="shipping_charge">
                                            <div data-repeater-item="">
                                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                                    <label for="pass">Shipping Distict</label>
                                                    <br>

                                                    <select name="distict" class="form-control">

                                                        @foreach($disticts as $keys => $values)
                                                            <option value="{{$keys}}" <?php echo ($keys == $shipping['distict']) ? "selected" : "" ?>>{{$values}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-group mb-1 col-sm-12 col-md-5">
                                                    <label for="email-addr">Shipping Amount</label>
                                                    <br>
                                                    <input type="text" name="amount" class="form-control"
                                                           id="email-addr"
                                                           placeholder="Enter Amount"
                                                           value="{{$shipping['amount']}}">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                    <button type="button" class="btn btn-danger"
                                                            data-repeater-delete=""
                                                            style="margin: 23px 0 0 -20px;"><i class="ft-x"></i>
                                                        Delete
                                                    </button>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>

                                    @endforeach
                                @else

                                    <div data-repeater-list="shipping_charge">
                                        <div data-repeater-item="">
                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                <label for="pass">Shipping Distict</label>
                                                <br>
                                                <select name="distict" class="form-control">

                                                    @foreach($disticts as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                <label for="email-addr">Shipping Amount</label>
                                                <br>
                                                <input type="text" name="amount" class="form-control"
                                                       id="email-addr"
                                                       placeholder="Enter Amount">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                <button type="button" class="btn btn-danger" data-repeater-delete=""
                                                        style="margin: 23px 0 0 -20px;"><i class="ft-x"></i> Delete
                                                </button>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                @endif


                                <div class="form-group overflow-hidden">
                                    <div class="col-12">
                                        <button data-repeater-create="" id="repeat"
                                                class="btn btn-primary btn-lg repeat-btn"
                                                style="margin-left: 15px">
                                            <i class="icon-plus4"></i> Add New Shipping
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger" style="margin: 0 0 20px 15px;">
                        <i class="icon-plus4"></i> Save Changes
                    </button>

                </form>

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        @if($logo == null)
        $('#blah').hide();
        @endif

        @if(Session::has('msg'))
        swal({
            text: "You Information Added Successfully!",
            icon: "success",
            timer: 3000
        });

        @endif

        function readURL(input) {
            if (input.files && input.files[0]) {
                $('#blah').show();

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)

                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#repeat').on('click', function () {
            return false;
        })
    </script>
@endsection