@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="">{{ $subcategory->menu->menu_name }}</a></li>
            
            <li><a href="{{ route('category.product',['id'=>$subcategory->category->id,'name'=>$subcategory->category->category_name]) }}">{{ $subcategory->category->category_name }}</a></li>
            <li ><a href="{{ route('subcategory.product',['id'=>$subcategory->id,'name'=>$subcategory->sub_category_name]) }}"> {{ $subcategory->sub_category_name }}</a></li>
            <li class="active">Products</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3 sidebar_data">

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filter by Price</h3>
                    <p>
                        Price Range:<p id="amount"></p>
                    </p>

                    <div id="slider-range"></div>
                    <input type="hidden" id="amount1">
                    <input type="hidden" id="amount2">

                    <input type="hidden" id="sub_category" name="sub_category" value="{{ $subcategory->id }}">
                </div>
                <!-- aside widget -->





                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Top Rated Product</h3>

                    <!-- widget product -->
                    <div class="product product-widget">
                        <div class="product-thumb">
                            <img src="{{ url('./img/thumb-product01.jpg') }}" alt="">
                        </div>
                        <div class="product-body">
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <h3 class="product-price">$32.50</h3>

                        </div>
                    </div>
                    <!-- /widget product -->



                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <!-- store top filter -->
                <div id="store">
                   @include('pages.sub_category_product_paginate')
                </div>
        </div>
        <!-- /MAIN -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->
@endsection

@push('script') 

 <script type="text/javascript">
     
    $(document).ready(function(){

  
  $('#store').on('click', '.store-pages a', function (e) {
                getData($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });



    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 10000,
      values: [ 100, 5000 ],
      change:function( event, ui ) {
        $( "#amount" ).html( "৳" + ui.values[ 0 ] + " - ৳" + ui.values[ 1 ] );
        $( "#amount1" ).val(ui.values[ 0 ]);
        $( "#amount2" ).val(ui.values[ 1 ]);

        getData(1);
      }


    });
    $( "#amount" ).html( "৳" + $( "#slider-range" ).slider( "values", 0 ) +
     " - ৳" + $( "#slider-range" ).slider( "values", 1 ) );
  


  

  function getData(page){
    
    var sub_category = $('#sub_category').val();
    var amount1 = $('#amount1').val();
    var amount2 = $('#amount2').val();


    $.ajax({
       
       url:'?page='+page+'&sub_category='+sub_category+'&amount1='+amount1+'&amount2='+amount2,
       datatype:"html",


      }).done(function(data){
         
         $('#store').html(data);
         $("html, body").animate({ scrollTop: 0 }, 800);

      }).fail(function(){
       
       alert('Server Error');

      });


  }
    
    

    });
 </script>

@endpush