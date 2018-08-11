            <!-- row -->
                    <div class="row">
                        @php
                            $count_product =  count($product);
                            @endphp
                        @if($count_product =='0')
                        <div class="col-md-12">
                            <h3 class="alert alert-success alert-large">Product Coming Soon. Thank You for Stay with us.</h3>
                        </div>
                        @endif
                        <!-- Product Single -->
                        @foreach($product as $products)
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    @if($products->discount > 0)
                                    <div class="product-label">
                                        <span class="sale">-{{ $products->discount }}%</span>
                                    </div>
                                    @endif
                                    <a href="{{ route('product.details',['id'=>$products->id,'name'=>$products->product_name]) }}" class="main-btn quick-view"><i class="fa fa-search-plus"></i>view</a>
                                    <img src="{{ url('productImage/',$products->product_image) }}" style="height: 250px" alt="">
                                </div>
                                <div class="product-body">
                                    @php
                                        $current_price_percent = ($products->selling_price * $products->discount) / 100 ;

                                        $current_price = $products->selling_price - $current_price_percent;
                                    @endphp
                                    <h4 class="product-price">৳-{{ $current_price }} 
                                        @if($products->discount > 0)
                                        <del class="product-old-price">৳-{{ $products->selling_price }}</del>
                                        @endif
                                    </h4>

                                    <h4 class="product-name"><a href="{{ route('product.details',['id'=>$products->id,'name'=>$products->product_name]) }}">{{ $products->product_name }}</a></h4>
                                    <div class="product-btns">
                                        <form action="{{ route('cart.add') }}">
                                            <input type="hidden" name="id" value="{{ $products->id }}"> 

                                            <input type="hidden" name="price" value="{{ round($current_price) }}">

                                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- /end Product Single -->

                        


                    </div>
                    <!-- /row -->

                     <div class="row">
                               <!-- store bottom filter -->
                <div class="store-filter clearfix">

                    <div class="pull-right">
             <!--            <div class="page-filter">
                            <span class="text-uppercase">Show:</span>
                            <select class="input" id="page_number">
                                <option value="3">3</option>
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="12">12</option>
                            </select>
                        </div> -->
                        {{ $product->links('vendor.pagination.custom_pagination') }}
             <!--            <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul> -->
                    </div>
                </div>
                <!-- /store bottom filter -->
                     </div>