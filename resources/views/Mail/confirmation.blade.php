<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="text-align: center">
                <h5 class="card-header" style="font-family: 'Open Sans', sans-serif; font-size: 20px">Confirmation Mail</h5>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 16px">Your Purchase Product List</h5>
                    <p class="card-text">we will delivered your product within our time and & Before we go we will contact with you.</p>

                    <table>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($p as $products)

                                <tr>
                                    <td>{{$products->product_name}}</td>
                                    <td>{{$products->product_quantity}}</td>

                                    @if($products->product_special_price != null)
                                        <td>{{$products->product_special_price}}</td>

                                    @else
                                        <td>{{$products->product_price}}</td>
                                    @endif


                                    @if($products->product_special_price != null)
                                        <td>{{$products->product_special_price * $products->product_quantity}}</td>

                                    @else
                                        <td>{{$products->product_price * $products->product_quantity}}</td>
                                    @endif
                                </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    @if($p[0]->shipping_method == 'regular')
                                        Shipping Fee : {{$p[0]->shipping_fee}}
                                    @else
                                        Shipping Fee : {{$p[0]->shipping_fee}}
                                    @endif

                                </td>
                                <td>Total : {{$p[0]->total_payment}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <a href="{{url('shopping.helpplusbd.com')}}" class="btn btn-primary" style="display: block">Visit Our Site</a>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>