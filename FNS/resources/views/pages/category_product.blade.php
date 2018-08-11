@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="">{{ $product_category->menu->menu_name }}</a></li>
            <li><a href="{{ route('category.product',['id'=>$product_category->id,'name'=>$product_category->category_name]) }}">{{ $product_category->category_name }}</a></li>
            
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
                    <h3 class="aside-title">Shop by Category:</h3>
                    
                    @foreach($product_subcategory as $key)
                    <label class="checking">{{ $key->sub_category_name }}
                        <input type="checkbox" name="sub_category[]" value="{{ $key->id }}" class="chk">
                        <span class="checkmark"></span>
                    </label>
                    
                    @endforeach
                    <input type="hidden" name="" value="{{ $product_category->id }}" id="category">
                    

                </div>
                <!-- /aside widget -->
                <!-- aside widget -->
<!--                 <div class="aside">

                    <h3 class="aside-title">Filter By Size:</h3>
                    <ul class="size-option">
                        <li class="active"><a href="#">S</a></li>
                        <li class="active"><a href="#">XL</a></li>
                        <li><a href="#">SL</a></li>
                    </ul>
                </div> -->
                <!-- /aside widget -->
                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filter by Price</h3>
                      <p>
    Price Range:<p id="amount"></p>
  </p>

    <div id="slider-range"></div>
    <input type="hidden" id="amount1">
    <input type="hidden" id="amount2">
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
                            <h3 class="product-price">৳32.50 <del class="product-old-price">৳45.00</del></h3>

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


                <!-- STORE -->
                <div id="store">
                   @include('pages.category_product_paginate')
                </div>
                <!-- /STORE -->

          
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


    $('.chk').on('change', function (e) {
      
      getData(1);  
     
    });

    // $('#page_number').on('change',function(){
         
    //      getData(1)

    // });

    // $('#price-slider').on('change'function(){
     
    //  alert('dd');

    // });

// $('#slider-range').slider({range: true, slide: showValue, change: showValue});

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
    
    var category = $('#category').val();
    var amount1 = $('#amount1').val();
    var amount2 = $('#amount2').val();
    sub_category  = [];

  $(".chk:checked").each(function(){
        sub_category.push($(this).val());
    });


    $.ajax({
       
       url:'?page='+page+'&category='+category+'&sub_category='+sub_category+'&amount1='+amount1+'&amount2='+amount2,
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