<!-- Mainly scripts -->

<script src="{{asset('backEndResource/js/jquery-3.1.1.min.js')}}"></script>

<script src="{{asset('backEndResource/js/bootstrap.min.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>



<!-- Flot -->

<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.spline.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.resize.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.pie.js')}}"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<!-- Peity -->

<script src="{{asset('backEndResource/js/plugins/peity/jquery.peity.min.js')}}"></script>

<script src="{{asset('backEndResource/js/demo/peity-demo.js')}}"></script>



<!-- Custom and plugin javascript -->

<script src="{{asset('backEndResource/js/inspinia.js')}}"></script>

<script src="{{asset('backEndResource/js/plugins/pace/pace.min.js')}}"></script>



<!-- jQuery UI -->

{{-- <script src="{{ asset('backEndResource/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
<script src="{{ asset('backEndResource/js/jquery-ui.min.js') }}"></script>
<script src="{{asset('backEndResource/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('backEndResource/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<!-- GITTER -->
<script src="{{asset('backEndResource/js/plugins/gritter/jquery.gritter.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backEndResource/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Sparkline demo data  -->
<script src="{{asset('backEndResource/js/demo/sparkline-demo.js')}}"></script>



<!-- ChartJS-->

<script src="{{asset('backEndResource/js/plugins/chartJs/Chart.min.js')}}"></script>



<!-- Toastr -->

<script src="{{asset('backEndResource/js/plugins/toastr/toastr.min.js')}}"></script>



<script src="{{asset('backEndResource/js/plugins/dataTables/datatables.min.js')}}"></script>

<script src="{{asset('backEndResource/js/jquery.repeater.min.js')}}"></script>

<script src="{{asset('backEndResource/js/form-repeater.js')}}"></script>





<!-- Markdown parser -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/pagedown/1.0/Markdown.Converter.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>





<!-- Plugin -->

<script src="{{asset('backEndResource/js/jquery.colorpicker.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




@yield('scripts')

<script>
$(document).ready(function () {
    $('[id="accordion"]').accordion({
        collapsible: true,
        active: false,
        heightStyle: 'content',
        header: 'h3',
        icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" },
    }).sortable({
        items: '.group'
    });

    $('#accordion').on('accordionactivate', function (event, ui) {
        if (ui.newPanel.length) {
            $('#accordion').sortable('disable');
        } else {
            $('#accordion').sortable('enable');
        }
    });
});

    $(document).ready(function(){

        $('.dataTables-example').DataTable({

            pageLength: 25,

            responsive: true,

            dom: '<"html5buttons"B>lTfgitp',

            buttons: [

                { extend: 'copy'},

                {extend: 'csv'},

                {extend: 'excel', title: 'ExampleFile'},

                {extend: 'pdf', title: 'ExampleFile'},



                {extend: 'print',

                    customize: function (win){

                        $(win.document.body).addClass('white-bg');

                        $(win.document.body).css('font-size', '10px');



                        $(win.document.body).find('table')

                            .addClass('compact')

                            .css('font-size', 'inherit');

                    }

                }

            ]



        });



    });

</script>

<script>

function order_shipping(order_id,userId) {
    swal({
        title: "Are you sure?",
        icon: "success",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{url('/order_shipping')}}",
                    type: 'POST',
                    data: {
                        'order_id' : order_id,
                        'user_id'  : userId
                    },

                    success : function (response) {
                        swal("Poof! Your Order has been Delivered!", {
                            icon: "success",
                        });
                    }

                });

                location.reload();
            } else {
                swal("Your Order is safe!");
            }
        });
}

function cancel_order(order_id,userId) {


    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{url('/cancel_order')}}",
                    type: 'POST',
                    data: {
                        'order_id' : order_id,
                        'user_id'  : userId
                    },

                    success : function (response) {
                        swal("Poof! Your Order has been deleted!", {
                            icon: "success",

                        });

                    }


                });

                location.reload();
            } else {
                swal("Your Order is safe!");
            }
        });



}

</script>





<script>



    function goToSub(value){



        var parentsCategory = value;

        // console.log(value);

        $.ajax({



            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: "{{url('/admin/chaining_product')}}"+"/"+parentsCategory,

            type:'POST',



            success: function (response) {



                console.log(response);







                $("#subCategory").html(response[0]);

                $("#product_brand").html(response[1]);





            },



        })





    }





    function goToBrands(value){



        console.log(value);



        var Category = value;

        console.log(value);

        $.ajax({



            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: "{{url('/admin/chaining_brand')}}"+"/"+Category,

            type:'POST',



            success: function (response) {



                console.log(response);



                $("#product_brand").html(response);





            },



        })





    }









</script>





<script>



    function addToSlider(e) {



        var product_id = e.id;



        $.ajax({



            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: "{{url('/admin/inserting_slider')}}"+"/"+product_id,

            type:'POST',



            success: function (response) {



                console.log(response);



                $("#"+product_id).html(response);





            },



        })





    }





</script>





<script>



    function addFlashSale(e) {



        var product_id = e.id;



        // var start_date = document.getElementById('start_date').value;

        // var start_hour = document.getElementById('s_h').value;

        // var start_min = document.getElementById('s_m').value;



        // var end_date = document.getElementById('end_date').value;

        // var end_hour = document.getElementById('e_h').value;

        // var end_min = document.getElementById('e_m').value;



        var new_discount = document.getElementById('new_discount'+product_id).value;


        // var start_time = start_date+" "+start_hour+":"+start_min+":00";

        // var end_time = end_date+" "+end_hour+":"+end_min+":00";





        var data={



            'product_id' : product_id,

            // 'start_time' : start_time,

            // 'end_time'   : end_time,

            'product_discount':new_discount

        };



        $.ajax({

            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            url: "{{url('admin/bestDeals/store')}}",

            type:'POST',

            data: data,





            success: function (response) {



                console.log(response);



                $('#'+product_id).attr('disabled',true);





            },



        });







    }





</script>

<script>
    $(".select2_demo_3").select2({
        placeholder: "Select a product",
        allowClear: true
    });
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height:200
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote1').summernote({
            height:200
        });
    });
</script>


<script>

    $('#discount-percentage').hide();
    $('#fixed-product-discount').hide();
    $('#fixed-cart-discount').hide();
    $('#select_product_id').hide();

    function change_coupon_type(val) {

        var id = val.value;

        console.log(id);

        if (id == "c-1"){
            $('#discount-percentage').show();
            $('#select_product_id').show();
            $('#fixed-product-discount').hide();
            $('#fixed-cart-discount').hide();
        }
        if (id == "c-2"){
            $('#discount-percentage').hide();
            $('#fixed-product-discount').show();
            $('#select_product_id').show();
            $('#fixed-cart-discount').hide();
        }
        if (id == "c-3"){
            $('#discount-percentage').hide();
            $('#fixed-product-discount').hide();
            $('#fixed-cart-discount').show();
            $('#select_product_id').hide();
        }
        if (id == ''){
            $('#discount-percentage').hide();
            $('#fixed-product-discount').hide();
            $('#fixed-cart-discount').hide();
            $('#select_product_id').hide();
        }

    }

</script>

<script>

    function filters(value) {

        var Filter = value;

        if (Filter != ""){
            $('#from').attr('disabled',true);
            $('#request_to').attr('disabled',true);
        }else {
            $('#from').attr('disabled',false);
            $('#request_to').attr('disabled',false);
        }

    }
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
    
<script>
    (function($){
        $(document).ready(function(){
            ClassicEditor
                .create( document.querySelector( '#post_content' ) )
                .then( editor => {
                    editor.style.height = '300px'
                    console.log(editor);
                } )
                .catch( error => {
                    console.error( error );
                } );
        });
    })(jQuery);
</script> 


