@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="">{{ $product->menu->menu_name }}</a></li>
            <li><a href="{{ route('category.product',['id'=>$product->category->id,'name'=>$product->category->category_name]) }}">{{ $product->category->category_name }}</a></li>
            <li><a href="{{ route('subcategory.product',['id'=>$product->sub_category->id,'name'=>$product->sub_category->sub_category_name]) }}">{{ $product->sub_category->sub_category_name }}</a></li>
            <li class="active">{{ $product->product_name }}</li>
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
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div class="col-md-10 col-md-offset-1">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img src="{{ url('productImage/'.$product->product_image) }}" alt="" style="max-height: 400px">
                            </div>
                           @foreach($product_image as $images)
                            <div class="product-view">
                                <img src="{{ url('productImage/'.$images->image) }}" alt="" style="max-height: 400px">
                            </div>
                            @endforeach
                            
                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img src="{{ url('productImage/'.$product->product_image) }}" alt="" style="max-height: 80px">
                            </div>
                            @foreach($product_image as $image)
                            <div class="product-view">
                                <img src="{{ url('productImage/'.$image->image) }}" alt="" style="max-height: 80px">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('cart.add') }}">
                    <div class="product-body">
                        <div class="product-label">
                            @if($product->discount > 0)
                            <span class="sale">-{{ $product->discount }}%</span>
                            @endif
                        </div>
                        <h2 class="product-name">{{ $product->product_name }}</h2>
                        @php
                            $parcent_price = ($product->selling_price * $product->discount) / 100 ;

                            $current_price = $product->selling_price - $parcent_price;
                        @endphp
                        <h3 class="product-price">৳{{ $current_price }} 
                            @if($product->discount > 0)
                            <del class="product-old-price">৳{{ $product->selling_price }}</del>
                            @endif
                        </h3>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <a href="#">3 Review(s) / Add Review</a>
                        </div>

                        <p>{{ $product->short_description }}</p>
                        <div class="product-options">
                            <ul class="size-option">
                                <li style="margin-top: 5px;"><span class="text-uppercase">Size:</span></li>
                                @foreach($product_size as $sizes)

                                    

                                    <div class="btn-group" data-toggle="buttons">
            
                                        <label class="btn btn-default">
                                            <input type="radio" id="star5" name="size" value="{{ $sizes->size->sizes ? $sizes->size->sizes : 'No'  }}" required="" />&nbsp;{{ $sizes->size->sizes ? $sizes->size->sizes : 'No'  }}
                                        </label>
                                    
                                    </div>

                                                        
                                    

                                @endforeach
                            </ul>


                            <!-- <ul class="color-option">
                                <li><span class="text-uppercase">Color:</span></li>
                                <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                                <li><a href="#" style="background-color:#8A2454;"></a></li>
                                <li><a href="#" style="background-color:#BF6989;"></a></li>
                                <li><a href="#" style="background-color:#9A54D8;"></a></li>
                            </ul> -->
                        </div>


                        <div class="product-btns">
                            <div class="qty-input">
                                <span class="text-uppercase">QTY: </span>
                                <input class="input" type="number" value="1" name="qty">
                                  <input type="hidden" name="id" value="{{ $product->id }}"> 

                                            <input type="hidden" name="price" value="{{ round($current_price) }}">
                            </div>
                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            <div class="pull-right">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Policy</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p><?php echo $product->description?></p>
                            </div>
                            <div id="tab2" class="tab-pane fade in">
                                <p>this is details part</p>
                            </div>

                            <div id="tab3" class="tab-pane fade in">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-reviews">
                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <ul class="reviews-pages">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-uppercase">Write Your Review</h4>
                                        <p>Your email address will not be published.</p>
                                        <form class="review-form">
                                            <div class="form-group">
                                                <input class="input" type="text" placeholder="Your Name" />
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="email" placeholder="Email Address" />
                                            </div>
                                            <div class="form-group">
                                                <textarea class="input" placeholder="Your review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-rating">
                                                    <strong class="text-uppercase">Your Rating: </strong>
                                                    <div class="stars">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection