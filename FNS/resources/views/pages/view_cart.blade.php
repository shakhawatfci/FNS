@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Cart</li>
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
                <form id="checkout-form" class="clearfix">
                    

                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Order Review</h3>
                            </div>

                            @if(Cart::count()>0)

                            <div class="table-responsive">
                            <table class="shopping-cart-table table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th></th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($cart as $value)
                                    <tr>
                                        <td class="thumb"><img src="{{ asset('productImage/'.getProductImage($value->id)) }}" alt=""></td>
                                        <td class="details">
                                            <a href="#">{{ $value->name }}</a>
                                            <ul>
                                                <li><span>Size: {{ $value->options->has('size') ? $value->options->size : 'No' }}</span></li>
                                                <!-- <li><span>Color: Camelot</span></li> -->
                                            </ul>
                                        </td>
                                        <td class="price text-center"><strong>৳{{ $value->price }}</strong><br>
                                            <!-- <del class="font-weak"><small>$40.00</small></del> -->

                                        </td>
                                        <form  method="post" style="display: none">
                                        </form>                    


                                        <form action="{{ route('cart.update',$value->rowId) }}" method="post">
                                           
                                            {{ csrf_field() }}

                                          <input type="hidden" name="_method" value="PUT">  
                                          <input type="hidden" name="product_id" value="{{ $value->id }}">  
                                          
                                        <td class="qty text-center">
                                            <input class="input" type="number" value="{{ $value->qty }}" name="qty" onchange="this.form.submit()">


                                        </td>
                                        <td class="total text-center"><strong class="primary-color">৳{{ $value->price*$value->qty }}</strong></td>
                                        <td class="text-right">

                                        <!-- <button type="submit" class="main-btn icon-btn"><i class="fa fa-check"></i></button> -->

                                        <a href="{{ route('cart.remove',$value->rowId) }}" class="main-btn icon-btn"><i class="fa fa-close"></i></a>
                                        </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Total</th>
                                        <th colspan="2" class="sub-total">${{ Cart::subTotal() }}</th>
                                    </tr>
                            <!--         <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SHIPING</th>
                                        <td colspan="2">Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">$97.50</th>
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                            <div class="pull-right">
                                <a href="{{ route('cart.checkout') }}" class="primary-btn">Checkout</a>
                            </div>
                            @else
                            <div class="text-center">
                                <h3>No Item In Cart</h3>
                            </div>
                            @endif
                        </div>

                    </div>
                </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection