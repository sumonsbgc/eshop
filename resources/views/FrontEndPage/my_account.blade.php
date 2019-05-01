@extends('FrontEndPage.templateParts.master')

@section('title','My Account')

@section('content')

    <div class="myAccount my-3">

        <div class="container">
            <div class="row" id="tabs">
                <div class="col-lg-3">
                    <div class="accountSidebar">
                        <div class="accountSidebarHeading text-center">
                            <h4>Hello {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
                        </div>
                        <div class="SidebarItems">
                            <h3 class="my-3">Manage Account</h3>
                            <ul id="account-options">
                                <li><a href="#tab-1">Edit Profile</a></li>
                                <li><a href="#tab-2">Address Book</a></li>
                                <li><a href="#tab-3">Wishlist</a></li>
                                <li><a href="#tab-4">My Orders</a></li>
                                <li><a href="#tab-5">My Return</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div id="tab-1" class="EditProfile edit-box">

                        <h2>Edit Profile</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Birth Day Date</label>
                                        <input type="date" class="form-control" name="birthday_date" value="{{$user->birthday_date}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option @if($user->gender =="male") {{"selected"}} @endif value="male" >Male</option>
                                            <option @if($user->gender =="female") {{"selected"}} @endif value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div id="tab-2" class="AddressBook edit-box">

                        <h2>Address Book</h2>

                        <form method="post" action="{{route('myAccountUpdate',$user->id)}}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Region</label>
                                        <input type="text" class="form-control" name="region" value="{{$user->region}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" value="{{$user->state}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{$user->city}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div id="tab-3" class="EditProfile edit-box">

                        <h2>My Wish List</h2>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Price</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $wishlists = get_user_wishlist(\Illuminate\Support\Facades\Auth::user()->id); $b=0; @endphp

                            @if($wishlists->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">There Is no product in your wish list</td>
                                </tr>
                            @else
                                @foreach($wishlists as $wishlist)
                                    @php $b++; @endphp
                                    <tr>
                                        <td>{{$b}}</td>
                                        <td>{{$wishlist->product_name}}

                                            <span class="selected-product-remove d-block" onclick="remove_wishlist_product({{$wishlist->id}})"><i class="fas fa-trash-alt"></i></span>
                                        </td>
                                        <td>{{$wishlist->product_quantity}}</td>
                                        @if($wishlist->product_special_price != null)
                                            <td>{{$wishlist->product_special_price}}</td>
                                        @else
                                            <td>{{$wishlist->product_price}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                    <div id="tab-4" class="EditProfile edit-box">

                        <h2>My Order List</h2>

                        <ul class="nav nav-tabs order-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active tab-order-heading" id="home-tab" data-toggle="tab" href="#approve_order" role="tab" aria-controls="approve_order" aria-selected="true">Approve Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tab-order-heading" id="profile-tab" data-toggle="tab" href="#pending_order" role="tab" aria-controls="pending_order" aria-selected="false">Pending Order</a>
                            </li>
                        </ul>
                        <div class="tab-content user-order-tab-content" id="myTabContent">
                            <div class="tab-pane fade p-3 show active" id="approve_order" role="tabpanel" aria-labelledby="approve_order">
                                <table id="example" class="table order-table-datatable" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>receipt_no</th>
                                        <th>Date</th>
                                        <th>Order Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0; @endphp
                                    @foreach($success_orders as $success_order)
                                        @php $i++; @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$success_order->receipt_no}}</td>
                                            <td>
                                                @php

                                                    $date = date_create($success_order->created_at);

                                                    echo date_format($date,'d-M-Y');

                                                @endphp

                                            </td>
                                            <td>{{$success_order->total_payment}}</td>
                                            <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="view_order_{{$i}}">view order</button>


                                                <div class="modal fade bd-example-modal-xl" id="view_order_{{$i}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @php

                                                                    $get_order_list = get_order_items($success_order->receipt_no);

                                                                @endphp
                                                                <span>Shipping Method</span>
                                                                <p class="mb-3">{{$get_order_list[0]->shipping_method}}</p>


                                                                <span>Shipping Adress</span>
                                                                <p class="mb-3">{{$get_order_list[0]->shipping_address}}</p>

                                                                <span>Payment Method</span>
                                                                <p class="mb-3">{{$get_order_list[0]->payment_option}}</p>

                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Product Name</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Price</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($get_order_list as $order_item)
                                                                        @php $i++; @endphp
                                                                        <tr>
                                                                            <td>{{$i}}</td>
                                                                            <td>{{$order_item->product_name}}</td>
                                                                            <td>{{$order_item->product_quantity}}</td>
                                                                            <td>{{$order_item->product_price}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>

                                                                <h5 class="d-block">Discount : @if(isset($get_order_list[0]->discount_amount)){{$get_order_list[0]->shipping_fee}} @else {{0}} @endif</h5>
                                                                <h5 class="d-block">Shipping Fee : {{$get_order_list[0]->shipping_fee}}</h5>
                                                                <h5>Total Amount : {{$get_order_list[0]->total_payment}}</h5>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>receipt_no</th>
                                        <th>Date</th>
                                        <th>Order Total</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <div class="tab-pane fade p-3" id="pending_order" role="tabpanel" aria-labelledby="pending_order">

                                <table id="example1" class="table order-table-datatable" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>receipt_no</th>
                                        <th>Date</th>
                                        <th>Order Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0; @endphp
                                    @foreach($pending_orders as $pending_order)
                                        @php $i++; @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$pending_order->receipt_no}}</td>
                                            <td>
                                                @php

                                                    $date = date_create($pending_order->created_at);

                                                    echo date_format($date,'d-M-Y');

                                                @endphp

                                            </td>
                                            <td>{{$pending_order->total_payment}}</td>
                                            <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#view__pending_order_{{$i}}">view order</button>


                                                <div class="modal fade bd-example-modal-xl" id="view__pending_order_{{$i}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @php

                                                                    $get_order_list = get_order_items($pending_order->receipt_no);

                                                                @endphp
                                                                <span>Shipping Method</span>
                                                                <p class="mb-3">{{$get_order_list[0]->shipping_method}}</p>


                                                                <span>Shipping Adress</span>
                                                                <p class="mb-3">{{$get_order_list[0]->shipping_address}}</p>

                                                                <span>Payment Method</span>
                                                                <p class="mb-3">{{$get_order_list[0]->payment_option}}</p>

                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Product Name</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Price</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($get_order_list as $order_item)
                                                                        @php $i++; @endphp
                                                                        <tr>
                                                                            <td>{{$i}}</td>
                                                                            <td>{{$order_item->product_name}}</td>
                                                                            <td>{{$order_item->product_quantity}}</td>
                                                                            <td>{{$order_item->product_price}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>

                                                                <h5 class="d-block">Discount : @if(isset($get_order_list[0]->discount_amount)){{$get_order_list[0]->shipping_fee}} @else {{0}} @endif</h5>
                                                                <h5 class="d-block">Shipping Fee : {{$get_order_list[0]->shipping_fee}}</h5>
                                                                <h5>Total Amount : {{$get_order_list[0]->total_payment}}</h5>




                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>receipt_no</th>
                                        <th>Date</th>
                                        <th>Order Total</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>



                            </div>
                        </div>
                    </div>
                    <div id="tab-5" class="EditProfile edit-box">

                        <h2>My Return List</h2>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="4" class="text-center">There Is no product in your return list</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection

@section('scripts')

    <script>
        (function($) {
            $(document).ready(function () {
                $("#tabs").tabs();
            });
        })(jQuery);
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example1').DataTable();
        } );
    </script>


    @endsection