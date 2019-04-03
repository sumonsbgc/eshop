<!-- Mainly scripts -->
<script src="{{asset('backEndResource/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('backEndResource/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backEndResource/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('backEndResource/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.js')}}'"></script>
<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.resize.j')}}s"></script>
<script src="{{asset('backEndResource/js/plugins/flot/jquery.flot.pie.js')}}"></script>

<!-- Peity -->
<script src="{{asset('backEndResource/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('backEndResource/js/demo/peity-demo.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('backEndResource/js/inspinia.js')}}"></script>
<script src="{{asset('backEndResource/js/plugins/pace/pace.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('backEndResource/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>




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


<!-- Plugin extensions -->
<script src="{{asset('i18n/jquery.ui.colorpicker-nl.js')}}"></script>
<script src="{{asset('parts/jquery.ui.colorpicker-rgbslider.js')}}"></script>
<script src="{{asset('parts/jquery.ui.colorpicker-memory.js')}}"></script>


<script>
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

        var start_date = document.getElementById('start_date').value;
        var start_hour = document.getElementById('s_h').value;
        var start_min = document.getElementById('s_m').value;

        var end_date = document.getElementById('end_date').value;
        var end_hour = document.getElementById('e_h').value;
        var end_min = document.getElementById('e_m').value;

        var new_discount = document.getElementById('new_discount'+product_id).value;



        var start_time = start_date+" "+start_hour+":"+start_min+":00";
        var end_time = end_date+" "+end_hour+":"+end_min+":00";


        var data={

            'product_id' : product_id,
            'start_time' : start_time,
            'end_time'   : end_time,
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

<script class="prettyprint">
    $(function() {
        $('.colorpicker-full').colorpicker({
            parts:			'full',
            alpha:			true,
            showOn:			'both',
            buttonColorize: true,
            showNoneButton: true,
            buttonImage: "{{ asset('backEndResource/images/ui-colorpicker.png') }}"
        });

        $("#more_color").on('click', function(e){
            e.preventDefault();
            $('.colorpicker-full').each(function(){
                $(this).colorpicker({
                    parts:			'full',
                    alpha:			true,
                    showOn:			'both',
                    buttonColorize: true,
                    showNoneButton: true,
                    buttonImage: "{{ asset('backEndResource/images/ui-colorpicker.png') }}"
                })
            });
        })
    });


</script>

