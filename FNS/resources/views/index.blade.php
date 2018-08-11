 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
      <div class="row">

        <!-- pedning order  -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $total_pending_order }}</h3>

              <p>Pending Orders</p>
            </div>
            <div class="icon">
              <i class="fa  fa-circle-o-notch"></i>
            </div>
            <a href="{{ route('order.pending') }}" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>       
        
         <!-- pedning order  -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="background-color: #3c3c3c !important;">
            <div class="inner">
              <h3>{{ $total_delivered_order }}</h3>

              <p>Delivered Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o"></i>
            </div>
            <a href="{{ route('order.pending') }}" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $total_product }}</sup></h3>

              <p>Total Product</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $total_user }}</h3>

              <p>Total Customer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="background-color: #10b46e !important">
            <div class="inner">
              <h3>{{ $total_quantity }}</h3>

              <p>Total Quantity</p>
            </div>
            <div class="icon">
              <i class="fa fa-circle"></i>
            </div>
            <a href="{{ route('report.all') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->        

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $total_sold_quantity }}</h3>

              <p>Total Sold Quantity</p>
            </div>
            <div class="icon">
              <i class="fa  fa-adjust"></i>
            </div>
            <a href="{{ route('report.all') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->        


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="background-color: #186771 !important">
            <div class="inner">
              <h3>{{ $current_quantity }}</h3>

              <p>Current Stock</p>
            </div>
            <div class="icon">
              <i class="fa fa-circle-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->        


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="background-color: #83345b  !important">
            <div class="inner">
              <h3>{{ number_format($total_sell) }}</h3>

              <p>Total Sell</p>
            </div>
            <div class="icon">
              <i class="fa  fa-money"></i>
            </div>
            <a href="{{ route('report.all') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->        


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #000;color: #fff">
            <div class="inner">
              <h3>{{ number_format($total_profit) }}</h3>

              <p>Total Profit</p>
            </div>
            <div class="icon" style="color: #ccc !important">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="{{ route('report.all') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->



      </div>
      <!-- /.row -->
    

      @endsection