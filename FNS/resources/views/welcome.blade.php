@extends('master.master')
@section('content')
@include('includes.slider')

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container" >
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12" style="margin-left: -10px !important">
                <div class="section-title">
                    <h2 class="title">Latest Product</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-0 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- banner extra images-->
                <!-- <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="./img/banner14.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div> -->
                <!-- /banner -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-12 col-xs-6">
                    <div class="row">
                        <div id="product-slick-0" class="product-slick">
                            
                            <!-- Product Single -->
                            @foreach($latest_product as $latest_product_value)
                            <div class="product product-single">
                                <div class="product-thumb">
                                     @if($latest_product_value->discount > 0)
                                    <div class="product-label">
                                        <span class="sale">-{{ $latest_product_value->discount }}%</span>
                                    </div>
                                    @endif
                                    
                                    <a href="{{ route('product.details',['id'=>$latest_product_value->id,'name'=>$latest_product_value->product_name]) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</a>
                                    
                                    <img src="{{ url('productImage/',$latest_product_value->product_image) }}" style="height: 250px" alt="{{ $latest_product_value->product_name }}">
                                </div>
                                <div class="product-body">
                                    @php
                                        $letest_price_percent = ($latest_product_value->selling_price * $latest_product_value->discount) / 100 ;

                                        $current_price = $latest_product_value->selling_price - $letest_price_percent;
                                    @endphp
                                    <h4 class="product-price"> 

                                        ৳-{{ round($current_price) }}
                                         @if($latest_product_value->discount > 0)
                                         <del class="product-old-price">
                                        ৳-{{ round($latest_product_value->selling_price) }}</del>
                                        @endif

                                    </h4>

                                    <h4 class="product-name"><a href="{{ route('product.details',['id'=>$latest_product_value->id,'name'=>$latest_product_value->product_name]) }}" style="height: 40px;">{{ $latest_product_value->product_name }}</a></h4>
                                    <div class="product-btns">
                                        <form action="{{ route('cart.add') }}">
                                            <input type="hidden" name="id" value="{{ $latest_product_value->id }}"> 

                                            <input type="hidden" name="price" value="{{ round($current_price) }}">

                                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- /Product Single -->

                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
            <!-- section -->
            <div class="section section-grey hidden-xs">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- banner -->
                        <div class="col-md-8" >
                            <div class="banners banner-1">
                                <img src="./img/banner13.jpg" alt="">
                                <div class="banner-caption text-center">
                                    <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                                    <button class="primary-btn">Shop Now</button>
                                </div>
                            </div>
                        </div>
                        <!-- /banner -->

                        <!-- banner -->
                        <div class="col-md-4 col-sm-6" >
                            <a class="banners banner-1" href="#">
                                <img src="./img/banner11.jpg" alt="">
                                <div class="banner-caption text-center">
                                    <h2 class="white-color">NEW COLLECTION</h2>
                                </div>
                            </a>
                        </div>
                        <!-- /banner -->

                        
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /section -->
            <!-- row -->
            <div class="row">
                @php
                    $i=1;
                @endphp
                @foreach($category as $categories)
                @php
                    $i++;
                    $cat_product = App\Product::Where('category_id','=',$categories->id)
                    ->where('status','=','1')
                    ->orderBy('updated_at','desc')
                    ->take(10)->get();

                    $product_count = $cat_product->count();
                @endphp
                @if($product_count > 0)
                <!-- section-title -->
                <div class="col-md-12" style="margin-left: -10px !important">
                    <div class="section-title">
                        <h2 class="title"><a href="{{ route('category.product',['id'=>$categories->id,'name'=>$categories->category_name]) }}">{{ $categories->category_name }}</a></h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-{{ $i }} custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div id="product-slick-{{ $i }}" class="product-slick">
                            <!-- Product Single -->
                            @foreach($cat_product as $cat_products)
                            <div class="product product-single">
                                <div class="product-thumb">
                                    @if($cat_products->discount > 0)
                                    <div class="product-label">
                                        <span class="sale">-{{ $cat_products->discount }}%</span>
                                    </div>
                                    @endif
                                    <a href="{{ route('product.details',['id'=>$cat_products->id,'name'=>$cat_products->product_name]) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</a>
                                    <img src="{{ url('productImage/',$cat_products->product_image) }}" style="height: 250px" alt="">
                                </div>
                                <div class="product-body">
                                    @php
                                        $current_price_percent = ($cat_products->selling_price * $cat_products->discount) / 100 ;

                                        $current_price = $cat_products->selling_price - $current_price_percent;
                                    @endphp
                                    <h4 class="product-price">৳-{{ $current_price }} <del class="product-old-price">৳-{{ $cat_products->selling_price }}</del></h4>

                                    <h4 class="product-name"><a href="{{ route('product.details',['id'=>$cat_products->id,'name'=>$cat_products->product_name]) }}">{{ $cat_products->product_name }}</a></h4>
                                    <div class="product-btns">
                                        <form action="{{ route('cart.add') }}">
                                            <input type="hidden" name="id" value="{{ $cat_products->id }}"> 

                                            <input type="hidden" name="price" value="{{ round($current_price) }}">

                                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- /Product Single -->

                            
                            
                            
                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
            <!-- section -->
            <div class="section section-grey hidden-xs">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- banner -->
                        <div class="col-md-8" >
                            <div class="banners banner-1">
                                <img src="./img/banner13.jpg" alt="">
                                <div class="banner-caption text-center">
                                    <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                                    <button class="primary-btn">Shop Now</button>
                                </div>
                            </div>
                        </div>
                        <!-- /banner -->

                        <!-- banner -->
                        <div class="col-md-4 col-sm-6" >
                            <a class="banners banner-1" href="#">
                                <img src="./img/banner11.jpg" alt="">
                                <div class="banner-caption text-center">
                                    <h2 class="white-color">NEW COLLECTION</h2>
                                </div>
                            </a>
                        </div>
                        <!-- /banner -->

                        
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /section -->
            <!-- row -->
            <div class="row">
        
                @foreach($sub_category as $sub_categories)
                @php
                    $i++;
                    $subcat_product = App\Product::Where('sub_category_id','=',$sub_categories->id)
                    ->where('status','=','1')
                    ->orderBy('id','desc')
                    ->take(10)->get();

                    $product_count = $subcat_product->count();
                @endphp
                @if($product_count > 0)
                <!-- section-title -->
                <div class="col-md-12" style="margin-left: -10px !important">
                    <div class="section-title">
                        <h2 class="title"><a href="">{{ $sub_categories->sub_category_name }}</a></h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-{{ $i }} custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div id="product-slick-{{ $i }}" class="product-slick">
                            <!-- Product Single -->
                            @foreach($subcat_product as $subcat_products)
                            <div class="product product-single">
                                <div class="product-thumb">
                                    @if($subcat_products->discount > 0)
                                    <div class="product-label">
                                        <span class="sale">-{{ $subcat_products->discount }}%</span>
                                    </div>
                                    @endif
                                    <a href="{{ route('product.details',['id'=>$subcat_products->id,'name'=>$subcat_products->product_name]) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</a>
                                    <img src="{{ url('productImage/',$subcat_products->product_image) }}" style="height: 250px" alt="">
                                </div>
                                <div class="product-body">
                                    @php
                                        $current_price_percent = ($subcat_products->selling_price * $subcat_products->discount) / 100 ;

                                        $current_price = $subcat_products->selling_price - $current_price_percent;
                                    @endphp
                                    <h4 class="product-price">৳-{{ $current_price }} <del class="product-old-price">৳-{{ $subcat_products->selling_price }}</del></h4>

                                    <h4 class="product-name"><a href="{{ route('product.details',['id'=>$subcat_products->id,'name'=>$subcat_products->product_name]) }}">{{ $subcat_products->product_name }}</a></h4>
                                    <div class="product-btns">
                                        <form action="{{ route('cart.add') }}">
                                            <input type="hidden" name="id" value="{{ $subcat_products->id }}"> 

                                            <input type="hidden" name="price" value="{{ round($current_price) }}">

                                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- /Product Single -->

                            
                            
                            
                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection