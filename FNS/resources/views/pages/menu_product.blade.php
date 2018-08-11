@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Menu</li>
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
                    <label class="checking">One
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checking">Two
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checking">Three
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checking">Four
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>

                </div>
                <!-- /aside widget -->
                <!-- aside widget -->
                <div class="aside">

                    <h3 class="aside-title">Filter By Size:</h3>
                    <ul class="size-option">
                        <li class="active"><a href="#">S</a></li>
                        <li class="active"><a href="#">XL</a></li>
                        <li><a href="#">SL</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->
                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filter by Price</h3>
                    <div id="price-slider"></div>
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
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>

                        </div>
                    </div>
                    <!-- /widget product -->

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


                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">
                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</button>
                                    <img src="{{ url('./img/product01.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h4 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h4>

                                    <h4 class="product-name"><a href="#">Product Name Goes Here</a></h4>
                                    <div class="product-btns">

                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</button>
                                    <img src="{{ url('./img/product02.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h4 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h4>

                                    <h4 class="product-name"><a href="#">Product Name Goes Here</a></h4>
                                    <div class="product-btns">

                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</button>
                                    <img src="{{ url('./img/product03.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h4 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h4>

                                    <h4 class="product-name"><a href="#">Product Name Goes Here</a></h4>
                                    <div class="product-btns">

                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</button>
                                    <img src="{{ url('./img/product04.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h4 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h4>

                                    <h4 class="product-name"><a href="#">Product Name Goes Here</a></h4>
                                    <div class="product-btns">

                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</button>
                                    <img src="{{ url('./img/product05.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h4 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h4>

                                    <h4 class="product-name"><a href="#">Product Name Goes Here</a></h4>
                                    <div class="product-btns">

                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <button class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</button>
                                    <img src="{{ url('./img/product06.jpg') }}" alt="">
                                </div>
                                <div class="product-body">
                                    <h4 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h4>

                                    <h4 class="product-name"><a href="#">Product Name Goes Here</a></h4>
                                    <div class="product-btns">

                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->


                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">

                    <div class="pull-right">
                        <div class="page-filter">
                            <span class="text-uppercase">Show:</span>
                            <select class="input">
                                <option value="0">10</option>
                                <option value="1">20</option>
                                <option value="2">30</option>
                            </select>
                        </div>
                        <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection