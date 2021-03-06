  
   @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">{{ $user->name }} Order List</h3>
 			</div>

 			<div class="box-footer">
 			</div>	

 			<div class="box-body">
 		<div class="table-responsive" id="order">
 		     
 		     <table class="table table-striped table-bordered bs-datatable" style="width:100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Payment</th>
                <th>Status</th>
                <!-- <th>Delivered</th> -->
                <th>View/Action</th>
            </tr>
        </thead>
        <tbody>
         
          @foreach($order as $value)
        	<tr>

        		<td>{{ $value->id }}</td>
        		<td>{{ $value->name }}</td>
        		<td>{{ $value->phone }}</td>
        		<td>{{ date("d F Y", strtotime($value->order_date)) }}</td>
        		<td>৳ {{ get_order_total($value->id,$value->delivery_cost) }}</td>
        		<td>      
         @if($value->payment_method == App\AllStatic::$cash)
          Cash
          @elseif($value->payment_method == App\AllStatic::$bkash) 
          Bkash
          @else
          Rocket
          @endif</td>
          <td>@if($value->status == App\AllStatic::$pending)
          <span style="color: red">Pending</span> @else
           <span style="color: green">Delivered</span> @endif</td>
        	<!-- 	<td><a href="" class="btn btn-warning"><i class="fa fa-check"></i></a></td> -->
        		<td><a  href="{{ route('order.details',$value->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
        		
        
  
        	</tr>

          @endforeach	

        </tbody>
        </table> 	
 			</div>
 			</div>

 		

 		

 		</div>

 	</div>
   </div>


 @endsection



