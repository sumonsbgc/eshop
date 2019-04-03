<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{asset('frontEndResource/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Popper JS -->
<script src="{{asset('frontEndResource/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontEndResource/assets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('frontEndResource/assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('frontEndResource/assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('frontEndResource/assets/js/main.js')}}"></script>
<script src="{{asset('frontEndResource/assets/js/node_modules/dateformat/lib/dateformat.js')}}"></script>

<script>
        (function($) {
            $(document).ready(function () {
                $("#tabs").tabs();
            });
        })(jQuery);
</script>

<script>

    color = document.getElementById('product_color').value;

    $(".product_color").each(function(){
      $(this).on('click', function(){
          color = $(this).val();
      })
    });

    if ($('.quantity-colors').is('.sizes')) {
    
        product_size = document.querySelectorAll('#product_size').value;

        $(".product_size").each(function () {
            $(this).on('click',function () {
                product_size = $(this).val();
            })
        });

    }else {
        product_size = null;

        console.log(product_size);
    }




    var count = 0;

    function addToCart(e) {


        var id = e.id;

        count +=1;


        if (count % 2 == 1){
            console.log(color);

            var quantity = document.getElementById('quantity').value;
            console.log(quantity);


            $.ajax({

                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/addToCart')}}"+"/"+id,
                type:'GET',

                data:{
                  'product_quantity' : quantity,
                  'product_color' : color,
                  'product_size' : product_size,
                },

                success: function (response) {
                    var current_date = new Date();
                    c_date=dateFormat(current_date,'yyyy-mm-dd HH:MM:ss');

                    end_date = new Date(response.end_time);
                    e_date = dateFormat(end_date,'yyyy-mm-dd HH:MM:ss');

                    html = '';

                    path = "{{asset('storage/upload/product_image/')}}";

                    if (c_date < e_date){
                        discount = (response.product_price * response.product_discount)/100;
                        new_price = response.product_price - discount;

                        html += '<li>';
                        html+= '<a class="image">';
                        html += '<img src='+ path+'/'+response.product_image+'>';
                        html+= '</a>';
                        html+= '<div class="content">';
                        html+= '<a href="" class="title">'+response.product_name+'</a>';
                        html+= '<span>Price :</span><span>'+ new_price+'</span><br>';
                        html+= '<span>Qty :</span><span class="qty d-inline qnt">'+ response.product_quantity+'</span><br>';
                        html+= '<span>Total :</span><span class="qty d-inline cart-price">'+ response.product_quantity*new_price+'</span>';
                        html+='</div>';
                        html+='<button class="remove"><i class="fa fa-trash-o"></i></button>';
                        html+='</li>';

                    }
                    if (response.product_special_price != null){
                        html += '<li>';
                        html+= '<a class="image">';
                        html += '<img src='+ path+'/'+response.product_image+'>';
                        html+= '</a>';
                        html+= '<div class="content">';
                        html+= '<a href="" class="title">'+response.product_name+'</a>';

                        html+= '<span>Price :</span><span>'+ response.product_special_price+'</span><br>';

                        html+= '<span>Qty :</span><span class="qty d-inline qnt">'+ response.product_quantity+'</span><br>';
                        html+= '<span>Total :</span><span class="qty d-inline cart-price">'+ response.product_quantity*response.product_special_price+'</span>';
                        html+='</div>';
                        html+='<button class="remove"><i class="fa fa-trash-o"></i></button>';
                        html+='</li>';
                    }
                    else{
                        html += '<li>';
                        html+= '<a class="image">';
                        html += '<img src='+ path+'/'+response.product_image+'>';
                        html+= '</a>';
                        html+= '<div class="content">';
                        html+= '<a href="" class="title">'+response.product_name+'</a>';

                        html+= '<span>Price :</span><span>'+ response.product_price+'</span><br>';

                        html+= '<span>Qty :</span><span class="qty d-inline qnt">'+ response.product_quantity+'</span><br>';
                        html+= '<span>Total :</span><span class="qty d-inline cart-price">'+ response.product_quantity*response.product_price+'</span>';
                        html+='</div>';
                        html+='<button class="remove"><i class="fa fa-trash-o"></i></button>';
                        html+='</li>';
                    }

                    $("#cart_product").append(html);



                    var a = $('.cart-price');
                        sum = 0;
                        $.each(a, function(i, cv){

                            sum += parseInt($(cv).text());
                        });

                    var b = $('.qnt');

                        total =0;
                        $.each(b, function (i,cv) {
                            total+= parseInt($(cv).text());
                        });

                    {{--@php--}}
                        {{--$sum = 0;--}}
                        {{--if( session()->has('return_data') ){--}}
                            {{--foreach( session()->get('return_data') as $data ){--}}
{{--/*                                dd(gettype($data['product_price']));*/--}}
                                {{--$sum += $data['product_price'];--}}
                            {{--}--}}
                        {{--}--}}
                        {{--session(['sum'=> $sum])--}}
                    {{--@endphp--}}

                    $('#total_sum').text(sum);

                    $('#number').text(total);

                    var x= document.cookie = `sum = ${sum}`;
                    var y= document.cookie = `number = ${total}`;

                    console.log(y,x);

                    <?php

//                        if (isset($_COOKIE['sum'])){
//                          session(['total'=>$_COOKIE['sum']]);
//                        }
//
//                        if (isset($_COOKIE['number'])){
//                            session(['count'=>$_COOKIE['number']]);
//                        }
                    ?>



                },



            })

        }
        else{
            color.defaultValue;
            product_size.defaultValue;
            quantity.defaultValue;
        }
    }




</script>

