  
   @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')

    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Order Details: {{ $order->id }}
            <small class="pull-right">Order Date: {{ date("d F Y", strtotime($order->order_date)) }} </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Customer Info
          <address>
            <strong>{{ $order->name }}</strong><br>

            <span style="font-weight: bold">Phone:</span> {{ $order->phone }}<br>
            <span style="font-weight: bold">Email:</span> {{ $order->user->email ? $order->user->email : 'Not Found' }}<br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong>Delivery Address</strong><br>
           {{ $order->address }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Order ID: {{ $order->id }}</b><br>
          <br>
          

          <b>Payment Method:</b>
          @if($order->payment_method == App\AllStatic::$cash)
          Cash
          @elseif($order->payment_method == App\AllStatic::$bkash) 
          Bkash
          @else
          Rocket
          @endif
          <br>

          <b>Location:</b>
            @if($order->payment_location == App\AllStatic::$inside_dhaka)
             Inside Dhaka
            @else
             Outside Dhaka
            @endif
          <br>

          @if($order->status == App\AllStatic::$delivered)
          <b>Order Delivery Date</b> {{ date("d F Y", strtotime($order->order_delivery_date)) }}<br>
          @endif
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Product Code</th>
              <th>Size</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
              @php
               
               $sub_total = 0;
              @endphp
              @foreach($order_details as $value)
            <tr>
              <td><a href="">{{ $value->product->product_name }}</a></td>
              <td><a href=""><img src="{{ url('productImage/'.getProductImage($value->product_id)) }}" class="img-responsive" style="height: 40px;"></a></td>
              <td>{{ $value->product->product_code }}</td>
              <td>{{ $value->product_size }}</td>
              <td>{{ $value->sold_quantity }}</td>
              <td>৳{{ $value->sold_price }}</td>
              <td>৳{{ $price = $value->sold_price*$value->sold_quantity }}</td>
              <td><a onclick="return confirm('are you sure to delete?')"   href="{{ route('delete.details',$value->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
            @php
              $sub_total += $price;
            @endphp

            @endforeach
 
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-7">
<!--           <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <!-- <p class="lead">Amount Due 2/22/2014</p> -->

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>৳{{ $sub_total }}</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>৳{{ $order->delivery_cost }}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>৳{{ $sub_total+$order->delivery_cost }}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->

          @if($order->status == App\AllStatic::$pending)
          <a href="{{ route('order.confirm',$order->id) }}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Deliver/Confirm Order
          </a>
          @endif
         
          <a onclick="return confirm('Are You Sure?')" href="{{ route('order.delete',$order->id) }}" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-close"></i> Cancel Order
          </a>
        </div>
      </div>
    </section>



 @endsection



