@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
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
                <form action="{{ route('cart.order') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Shipping Details</h3>
                            </div>

                            @include('errors.validation_errors')
                            <div class="form-group">
                                <label for="shipping-1">User Name</label>
                                <input class="input" type="text" name="name" placeholder="Name" required="" value="{{ Auth::user()->name }}">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="shipping-1">Full Adress</label>
                                <textarea class="form-control" name="address" required="">{{ Auth::user()->address ? Auth::user()->address : ''  }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="shipping-1">Phone Number</label>
                                <input class="input" type="text" name="phone" placeholder="Mobile No." value="{{ Auth::user()->phone }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="shipping-1">Delivery Region</label>
                                <select class="input"  id="region" name="location">
                                    <option selected="" value="1">Inside Dhaka</option>
                                    <option value="2">Outside Dhaka</option>
                                </select>
                            </div>  

                            <div class="form-group">
                     
                                <input type="checkbox" name="save_info" value="1"> Save This Information For Next Time
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Payment Info</h3>
                            </div>
                            <div class="input-checkbox">
                                
                                <label for="shipping-1">Payment Method</label>
                                <select class="input"  name="payment_method" id="payment_type">
                                    <option value="1">Cash on delivery</option>
                                    <option value="2">Bkash</option>
                                    <option value="3">DBBL-Rocket</option>
                                </select>
                            </div>
                            <br>
                            <div style="display: none" class="input-checkbox" id="transection_process">
                                
                                <label for="shipping-1">Bkash No: xxxxxxxxxx</label>
                                <br>
                                <label for="shipping-1">Rocket No: xxxxxxxxxxxx</label>
                                <br>
                                <label for="shipping-1">Reference No: 1</label>
                                <br>
                                <label for="shipping-1">Transection Id:</label>
                                <input  type="text" name="transection_id" class="input" placeholder="EX: 5GUSDxxxxxG" id="transection_id">
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Order Review</h3>
                            </div>
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
                                    @php 
                                     
                                     $total_price = 0;
                                    @endphp
                                    @foreach(Cart::content() as $value)
                                    <tr>
                                           <td class="thumb"><img src="{{ asset('productImage/'.getProductImage($value->id)) }}" alt="" style="height: 40px;"></td>
                                        <td class="details">
                                            <a href="#">{{ $value->name }}</a>
                                            <ul>
                                                <li><span>Size: {{ $value->options->has('size') ? $value->options->size : 'No' }}</span></li>
                                                <!-- <li><span>Color: Camelot</span></li> -->
                                            </ul>
                                        </td>
                                        <td class="price text-center"><strong>৳{{ $value->price }}</strong><br>
                                            <!-- <del class="font-weak"><small>$40.00</small></del> -->

                                        @php    

                                        $price = $value->price*$value->qty;

                                        $total_price += $price;

                                        @endphp

                                        </td>
                                        <td class="qty text-center">{{ $value->qty }}</td>
                                        <td class="total text-center"><strong class="primary-color">৳{{ $value->price*$value->qty }}</strong></td>
                                    </tr>

                                    @endforeach

                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SUBTOTAL</th>
                                        <th colspan="2" class="sub-total text-center">৳{{ $total_price }}</th>
                                    
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SHIPING</th>
                                        <td colspan="2" id="shiping_cost" class="text-center">50</td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total text-center" >৳<span id="total_cost">{{ $total_price+50 }}</span></th>
                                      <input type="hidden" name="grand_price" value="{{ $total_price+50 }}" id="grand_price"> 
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                            <div class="pull-right">
                                @if(Cart::count()>0)
                                <button type="submit" class="primary-btn">Place Order</button>

                                @else
                                <a href="{{ url('/') }}" class="primary-btn">Continue Shipping</a>
                                @endif 
                            </div>
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

@push('script')

<script type="text/javascript">
    
    $(document).ready(function(){
     
    


     $('#payment_type').on('change',function(){
        
        var payment_type = $(this).val();
      

      if(payment_type == 1){
          
          $('#transection_process').hide();

      }
      else{

        $('#transection_process').show();
      }


      





     });

   // region and price changing location wise
   $('#region').on('change',function(){

         var region = $(this).val();
         var price  = $('#grand_price').val(); 

         var cost = 50;

         if(region == 1){
             cost = 50;
             price = price-50;

             price = price+cost;
             // alert(price);
         }
         else if(region == 2){
            
            cost = 80;

            price = price-50;
             
            price = price+cost;

            // alert(price);
         }
         else{
            alert('error');
         }


         $('#shiping_cost').text(cost);
         $('#total_cost').text(price);

      });
      
       
      
    });

</script>


@endpush