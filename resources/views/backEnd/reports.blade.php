@extends('backEnd.templateParts.master')
@section('title', 'Reports')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-lg-10">

            <h2>All Reports</h2>

            <ol class="breadcrumb">

                <li>

                    <a href="{{url('/')}}">Home</a>

                </li>

                <li class="active">

                    <strong>Reports</strong>

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

                        <h5>Reports </h5>

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

                        <form action="{{route('reports')}}" method="post">

                            @csrf

                            <div class="row">

                                <div class="col-sm-4">

                                    <label>Filter</label>

                                    <select id="filter" class="form-control" name="filter" onclick="filters(this.value)">

                                        <option value=""> Select One Option </option>

                                        <option value="1">Today</option>

                                        <option value="15">Last 15 Days</option>

                                        <option value="30">Last 30 Days</option>

                                        <option value="365">Last 365 Days</option>

                                    </select>

                                </div>

                                <div class="col-sm-3">

                                    <label>From

                                        <span class="danger"> *</span>

                                    </label>

                                    <div class="form-group">

                                        <input type="date" class="form-control"

                                               id="from" name="from" placeholder="Enter Date">

                                    </div>

                                </div>

                                <div class="col-sm-3">

                                    <label>To

                                        <span class="danger"> *</span>

                                    </label>

                                    <div class="form-group">

                                        <input type="date" class="form-control"

                                               id="request_to" name="to" placeholder="Enter Date">

                                    </div>

                                </div>

                                <div class="col-sm-2">

                                    <button type="submit" class="btn m-t btn-success" id="search"><i

                                                class="fa fa-search"></i> Search

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        <h5>Summery Of Reports</h5>

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

                            <table class="table">

                                <h3 class="pb-3">Full Summery Of The System</h3>

                                <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Quantity</th>

                                    <th>Total Amount</th>

                                </tr>



                                </thead>

                                <tbody id="summery_of_system">

                                <tr>

                                    <td>Total Product Purchase</td>

                                    <td>{{$total_product_purchase_count}}</td>

                                    <td>{{$total_product_purchase_amount}}</td>

                                </tr>

                                <tr>

                                    <td>Total Product Sell</td>

                                    <td>{{$total_sell_product_count}}</td>

                                    <td>{{$total_sell_product_amount}}</td>

                                </tr>

                                <tr>

                                    <td></td>

                                    <td></td>

                                    <td class="font-weight-bold">Loss : {{$loss}}</td>

                                </tr>

                                <tr>

                                    <td></td>

                                    <td></td>

                                    <td class="font-weight-bold">Profit : {{$profit}}</td>

                                </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        <h5>Summery Of Reports</h5>

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



                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active"><a href="#purchase" aria-controls="home" role="tab" data-toggle="tab">Purchase Product</a></li>

                            <li role="presentation"><a href="#sell" aria-controls="profile" role="tab" data-toggle="tab">Sell Product</a></li>

                        </ul>



                        <!-- Tab panes -->

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="purchase">



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

                                        </tr>

                                        </thead>

                                        <tbody>



                                        @php





                                            $id =0;



                                        @endphp







                                        @foreach($all_purchase as $product)

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

                                            </tr>



                                        @endforeach

                                        </tbody>

                                        <tfoot>

                                        <tr>

                                            <th></th>

                                            <th></th>

                                            <th></th>

                                            <th></th>

                                            <th></th>

                                            <th></th>

                                            <th>Total : {{$total_product_purchase_count}}</th>

                                            <th>Total : {{$total_product_purchase_amount}}</th>

                                        </tr>

                                        <tr>

                                            <th>Id</th>

                                            <th>Product Name</th>

                                            <th>Category</th>

                                            <th>Brand</th>

                                            <th>Code</th>

                                            <th>Model No</th>

                                            <th>Quantity</th>

                                            <th>Price</th>

                                        </tr>

                                        </tfoot>

                                    </table>

                                </div>



                            </div>

                            <div role="tabpanel" class="tab-pane" id="sell">





                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered table-hover dataTables-example">

                                        <thead>

                                        <tr>

                                            <th>Id</th>

                                            <th>Receipt No</th>

                                            <th>Product Quantity</th>

                                            <th>Total Price</th>

                                            <th>Sold Date</th>

                                        </tr>

                                        </thead>

                                        <tbody>



                                        @php





                                            $id =0;



                                        @endphp







                                        @foreach($all_sell as $product)

                                            @php

                                                $id++;

                                            @endphp

                                            <tr>

                                                <td>{{$id}}</td>

                                                <td>{{$product->receipt_no}}</td>

                                                <td>

                                                    @php



                                                        $quantity = get_report_details($product->receipt_no);



                                                        echo $quantity;

                                                    @endphp

                                                </td>

                                                <td>{{$product->total_payment}}</td>

                                                <td>

                                                    @php

                                                        $date = date_create($product->updated_at);

                                                        echo date_format($date,'d-M-Y');

                                                    @endphp

                                                </td>

                                            </tr>



                                        @endforeach

                                        </tbody>

                                        <tfoot>

                                        <tr>

                                            <th></th>

                                            <th></th>

                                            <th>Total : {{$total_sell_product_count}}</th>

                                            <th>Total : {{$total_sell_product_amount}}</th>

                                            <th></th>

                                        </tr>

                                        <tr>

                                            <th>Id</th>

                                            <th>Receipt No</th>

                                            <th>Product Quantity</th>

                                            <th>Total Price</th>

                                            <th>Sold Date</th>

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

@endsection