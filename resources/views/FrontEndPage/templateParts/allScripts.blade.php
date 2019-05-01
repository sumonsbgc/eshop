<script src="{{asset('FrontEndPageResource/bootstrap/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('FrontEndPageResource/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('FrontEndPageResource/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('FrontEndPageResource/owlCarousel/owl.carousel.min.js')}}"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('FrontEndPageResource/mixitup.min.js')}}"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('FrontEndPageResource/jquery.exzoom.js')}}"></script>
<script src="{{ asset('lang_assets/js/jquery.flagstrap.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('FrontEndPageResource/rating/rating.js') }}"></script>
<script src="{{ asset('FrontEndPageResource/responsivemenu/jquery.slicknav.min.js') }}"></script>

{{-- {{dd(session('subscribe'))}} --}}

    <script>
    @if(Session::get('subscribe') === true)
        swal({
            icon: "success",
            title: "Successfull",
            text: "You are successfully Subscribe In Our Websites",
            button: true,
            dangerMode: false
        })@elseif(Session::get('subscribe') === false )
        swal({
            icon: "warning",
            title: "Sorry!",
            text: "You are Already Subscribed Using This email",
            button: true,
            dangerMode: false
        })
    @endif
    </script>

<script>    
    (function($){
        $(window).scroll(function () {
            if ($(document).scrollTop() > 50) {
                $(".header").addClass("sticky_header");
            } else {
                $(".header").removeClass("sticky_header");
            }
        });
        $(document).ready(function(){
            $('.rating_container').rating(function(vote, event){
                console.log(vote);
            })
        });
        $(document).ready(function(){
            $('#db_nav_menu').slicknav({
                label: "MENU",
                duration: 1000,
                easingOpen: "easeOutBounce", //available with jQuery UI
                prependTo: ".responsive_menu",
            });
            // $(".xs-show").each(function(ind, val){
            //     $(this).on("click", function(){
            //         if($(this).siblings('div').hasClass('heightAuto')){
            //             $(this).siblings('div').removeClass('heightAuto');                    
            //         }else{
            //             $(this).siblings('div').addClass('heightAuto');                    
            //         }
            //         $(this).siblings('div').slideToggle();
            //     });
            // });
            
            $(".xs-show").on("click", function(){
                
                div = $(this).siblings('div');
                ul = $(this).siblings('div').find('ul');
                ulLength = ul.length;
                
                othersDiv = $(this).parent().siblings().children('div');
                othersUl = $(this).parent().siblings().children('div').find('ul');
                
                
                
                function addOrRemoveClass(){
                    if(ul.hasClass('heightAuto')){
                        ul.removeClass('heightAuto');
                    }else {
                        ul.addClass('heightAuto');
                    }
                }
                
                if(div.hasClass('heightAuto')){
                    div.removeClass('heightAuto');

                    addOrRemoveClass();
                }else{
                    othersUl.removeClass('heightAuto').slideUp();
                    othersDiv.removeClass('heightAuto').slideUp();
                    div.addClass('heightAuto');
                    if(1 === ulLength){
                        addOrRemoveClass();
                    }
                }
                
                div.slideToggle();
                ul.slideToggle();
            });
                            
        });
    }(jQuery));
</script>

<script>

function addToCart(product_id) {


    var product_id = product_id;

    var color = $('#p-color').text();

    var quantity = $('#qty').val();



    $.ajax({

        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('/addToCart')}}"+"/"+product_id,
        type:'GET',

        data:{
            'product_quantity' : quantity,
            'product_color' : color,
        },

        success: function (response) {

            console.log(response);

            html = '';

            path = "{{asset('storage/upload/product_image/')}}";

            <?php

                if (session('return_data') !=null){
                $count =count(session('return_data'));
                ?>
            html+='<div class="cart-product mb-3" id="cart-{{$count}}">';
            <?php

                }else{?>

                html+='<div class="cart-product mb-3" id="cart-0">';

            <?php }?>

            html+='<div class="cart-product mb-3">';
            html+=    '<div class="cart-product-image">';
            html+=    '<img src='+path+'/'+response.product_image+' alt="image" class="img-fluid">';
            html+=    '</div>';
            html+=    '<div class="cart-product-details">';
            html+=          '<h5>'+response.product_name+'</h5>';
            html+=          '<p>Color :'+response.product_color+'</p>';
            html+=          '<span><p class="d-inline quantities" id="quantities">'+response.product_quantity+'</p>* <i class="icofont-taka"></i>'+response.product_price+'</span>';
            html+=          '<span class="total-sub-amount">Total : <i class="icofont-taka"></i><span id="total-sub-amount" class="t-sub-amnt">'+response.product_quantity*response.product_price+'</span></span>';
            html+=    '</div>';
            html+=    '<div class="cart-product-remove">';

            <?php

                if (session('return_data') !=null){
                    $count =count(session('return_data'));
            ?>
            html+=          '<button type="button" onclick="remove_cart_product({{$count}})"><i class="fas fa-trash-alt"></i></button>';
            <?php

                }else{?>

                html+=          '<button type="button" onclick="remove_cart_product(0)"><i class="fas fa-trash-alt"></i></button>';

                <?php }?>

            html+=    '</div>';
            html+='</div>';

            $("#cart-product-list").append(html);
            $('.cart-message').css('display','none');


            var a = $('.t-sub-amnt');
            sum = 0;
            $.each(a, function(i, cv){
                sum += parseInt($(cv).text());
            });

            var b = $('.quantities');

            total =0;
            $.each(b, function (i,cv) {
                total+= parseInt($(cv).text());
            });


            $('#total_sum').text(sum);
            $('#t-quantity').text(total);

            //
            var x= document.cookie = `sum = ${sum}`;
            var y= document.cookie = `quantity = ${total}`;



            <?php


                if (isset($_COOKIE['sum'])){
                  session(['sum'=>$_COOKIE['sum']]);
                }

                if (isset($_COOKIE['quantity'])){
                    session(['quantity'=>$_COOKIE['quantity']]);
                }
            ?>
            
            swal("Successfully added this product in your cart");



        },

    });

}

function wishlist(product_id) {

    var product_id = product_id;

    var color = $('#p-color').text();

    var quantity = $('#qty').val();

    var has_size = document.querySelector('#p-size');

    var size = "";

    if (has_size != null){

        size = $('#p-size').val();

    }

    $.ajax({

        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('/addwishlist')}}",
        type:'POST',

        data:{
            'product_id' : product_id,
            'product_quantity' : quantity,
            'product_color' : color,
            'product_size' : size
        },

        success: function (response) {


            console.log(response);

            swal("Successfully added this product in your wishlist");


        },
        error: function (response) {
            if (response.status == 401){
                swal("Wait !","You Have To Login First.","warning");
            }
            if(response.status ==419){
                swal("Upps !!","Internal Error.","warning");
            }
        }

    });


}

function remove_wishlist_product(id) {
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{url('/remove_wishlist')}}"+"/"+id,
                    type:'GET',

                    success: function (response) {
                        swal("Poof! Your Cart Product has been deleted!", {
                            icon: "success",
                        });
                    }


                });

                location.reload();
            } else {
                swal("Your imaginary file is safe!");
            }
        });

}

function buynow(product_id) {


    var product_id = product_id;

    var color = $('#p-color').text();

    var quantity = $('#qty').val();



    $.ajax({

        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('/buynow')}}"+"/"+product_id,
        type:'GET',

        data:{
            'product_quantity' : quantity,
            'product_color' : color,
        },

        success: function (response) {

            html = '';

            path = "{{asset('storage/upload/product_image/')}}";

            <?php

                if (session('return_data') !=null){
                $count =count(session('return_data'));
                ?>
                html+='<div class="cart-product mb-3" id="cart-{{$count}}">';
            <?php

                }else{?>

                html+='<div class="cart-product mb-3" id="cart-0">';

            <?php }?>

                html+='<div class="cart-product mb-3">';
            html+=    '<div class="cart-product-image">';
            html+=    '<img src='+path+'/'+response.product_image+' alt="image" class="img-fluid">';
            html+=    '</div>';
            html+=    '<div class="cart-product-details">';
            html+=          '<h5>'+response.product_name+'</h5>';
            html+=          '<p>Color :'+response.product_color+'</p>';
            html+=          '<span><p class="d-inline quantities" id="quantities">'+response.product_quantity+'</p>* <i class="icofont-taka"></i>'+response.product_price+'</span>';
            html+=          '<span class="total-sub-amount">Total : <i class="icofont-taka"></i><span id="total-sub-amount" class="t-sub-amnt">'+response.product_quantity*response.product_price+'</span></span>';
            html+=    '</div>';
            html+=    '<div class="cart-product-remove">';

            <?php

                if (session('return_data') !=null){
                $count =count(session('return_data'));
                ?>
                html+=          '<button type="button" onclick="remove_cart_product({{$count}})"><i class="fas fa-trash-alt"></i></button>';
            <?php

                }else{?>

                html+=          '<button type="button" onclick="remove_cart_product(0)"><i class="fas fa-trash-alt"></i></button>';

            <?php }?>

                html+=    '</div>';
            html+='</div>';

            $("#cart-product-list").append(html);
            $('.cart-message').css('display','none');


            var a = $('.t-sub-amnt');
            sum = 0;
            $.each(a, function(i, cv){
                sum += parseInt($(cv).text());
            });

            var b = $('.quantities');

            total =0;
            $.each(b, function (i,cv) {
                total+= parseInt($(cv).text());
            });


            $('#total_sum').text(sum);
            $('#t-quantity').text(total);

            //
            var x= document.cookie = `sum = ${sum}`;
            var y= document.cookie = `quantity = ${total}`;



            <?php


            if (isset($_COOKIE['sum'])){
                session(['sum'=>$_COOKIE['sum']]);
            }

            if (isset($_COOKIE['quantity'])){
                session(['quantity'=>$_COOKIE['quantity']]);
            }
            ?>

            window.location.replace("{{url('/cartpage')}}");


        },

    });

}

</script>

<script>
function remove_cart_product(id) {

        swal({
            title: "Are you sure?",
            text: "Are You Wants To Remove The Product From Your Cart??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $('#cart-'+id).remove();
                    $('#cart-table-'+id).remove();
                    $.ajax({

                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('/removeCart')}}" + "/" + id,
                        type: 'GET',

                        success: function(response){
                            console.log(response);


                            var a = $('.t-sub-amnt');
                            sum = 0;
                            $.each(a, function(i, cv){
                                sum += parseInt($(cv).text());
                            });

                            var b = $('.quantities');

                            total =0;
                            $.each(b, function (i,cv) {
                                total+= parseInt($(cv).text());
                            });


                            $('#total_sum').text(sum);
                            $('#t-quantity').text(total);
                            
                            $('#my-cart-subtotal').text(total);
                            $('#mycart-total').text(total);

                            //
                            var x= document.cookie = `sum = ${sum}`;
                            var y= document.cookie = `quantity = ${total}`;
                            console.log(x);
                            console.log(y);



                            <?php


                            if (isset($_COOKIE['sum'])){
                                session(['sum'=>$_COOKIE['sum']]);
                            }

                            if (isset($_COOKIE['quantity'])){
                                session(['quantity'=>$_COOKIE['quantity']]);
                            }
                            ?>

                            swal("Poof! Your Cart Product has been deleted!", {
                                icon: "success",
                            });
                        }

                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });






    }


    var a = $('.t-sub-amnt');
    sum = 0;
    $.each(a, function(i, cv){
        sum += parseInt($(cv).text());
    });

    var b = $('.quantities');

    total =0;
    $.each(b, function (i,cv) {
        total+= parseInt($(cv).text());
    });


    $('#total_sum').text(sum);
    $('#t-quantity').text(total);

    //
    var x= document.cookie = `sum = ${sum}`;
    var y= document.cookie = `quantity = ${total}`;
    console.log(x);
    console.log(y);



    <?php


    if (isset($_COOKIE['sum'])){
        session(['sum'=>$_COOKIE['sum']]);
    }

    if (isset($_COOKIE['quantity'])){
        session(['quantity'=>$_COOKIE['quantity']]);
    }
    ?>
</script>

