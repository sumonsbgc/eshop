@extends('FrontEndPage.templateParts.master')


@section('title','Completed Cart')

@section('content')

    <div class="thank-u-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 py-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="alert alert-success" role="alert" style="font-size: 18px">
                                <span class="font-weight-bold">Thank You !!</span> you have completed your purchase.
                            </div>
                        </div>
                    </div>
                    {{--<h3 class="my-5 thanku-page-heading"></h3>--}}

                    <span>Your Purchase No :  #</span><span class="badge badge-success">{{get_receipt_no(\Illuminate\Support\Facades\Auth::user()->id) }}</span>

                    <p>We will contact you soon and will send you a confirmation email.</p>
                </div>

                <div class="col-lg-3 pt-3 pb-5">
                    <a class="processed-to-checkout d-block text-center" href="{{url('/')}}">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('scripts')

    <script>

        var date = new Date();

        document.cookie = `sub_total=; expires=${date};`;
        document.cookie = `coupon=; expires=${date};`;
        document.cookie = `discount_amount=; expires=${date};`;

        console.log(document.cookie)

    </script>

    @endsection
