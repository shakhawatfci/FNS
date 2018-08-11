 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
   <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Sell Report</h3>
 			</div>

 			<div class="box-body">
 					<div class="table-responsive">
 				<table class="table table-bordered table-hover table-condensed">
 					<tr>
 					    <th>Sold Date</th>
 					    <th>Customer</th>
 						<th>Product Code</th>
 						<th>Product Name</th>
                        <th>Menu</th>
 						<th>Category</th>
 						<th>Subcategory</th>
 						<th class="text-right">Quantity</th>
 						<th class="text-right">Buy Unit Price</th>
 						<th class="text-right">Sold Unit Price</th>
 						<th class="text-right">Total Price</th>
 					</tr>
 					@php 
                      $total_sold_quantity = 0; 
                      $total_sold_price = 0; 
                     

 					@endphp
                  @foreach($sell as $value)
 	               <tr>
 	               <td>{{ date("d F Y", strtotime($value->sold_date)) }}</td>
 	               <td>{{ $value->user->name ? $value->user->name : 'unknow' }}</td>
 	               	<td>{{ $value->product->product_code }}</td>
 	               	<td>{{ $value->product->product_name }}</td>
 	               	<td>{{ $value->product->menu->menu_name ? $value->product->menu->menu_name : ''  }}</td>
 	               	<td>{{ $value->product->category->category_name ? $value->product->category->category_name : ''  }}</td>   

 	                <td>{{ $value->product->sub_category->sub_category_name ? $value->product->sub_category->sub_category_name : ''  }}</td> 
 	                <td class="text-right">{{ $quantity = $value->sold_quantity  }}</td>
 	                <td class="text-right">{{ $value->buying_price }}</td>
 	                <td class="text-right">{{ $value->sold_price }}</td>
 	                <td class="text-right">{{ $value->total_sold_price  }}</td>
 	                	 
 	               </tr>
 	               @php
                  
             
                  $total_sold_quantity  += $quantity;
                  $total_sold_price  += $value->total_sold_price;

 	              @endphp


 				  @endforeach
 				  <tr style="color: #fff;background-color: #000;font-weight: bold;">
 				  	 <td colspan="7" class="text-right">Total=</td>
 				  	 <td class="text-right">{{ $total_sold_quantity }}</td>
 				  	 <td class="text-right" >--</td>
 				  	 <td class="text-right" colspan="2">{{ number_format($total_sold_price,2) }}</td>
 				  </tr>
 				</table>
 			</div>
 			</div>

 		

 			<div class="box-footer">
 				
 			</div>

 		</div>

 	</div>
   </div>

 @endsection