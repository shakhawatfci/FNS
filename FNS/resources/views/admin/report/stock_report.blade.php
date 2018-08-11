 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
   <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Stock Report</h3>
 			</div>

 			<div class="box-body">
 					<div class="table-responsive">
 				<table class="table table-bordered table-hover table-condensed">
 					<tr>
 						<th>Product Code</th>
 						<th>Product Name</th>
                        <th>Menu</th>
 						<th>Category</th>
 						<th>Subcategory</th>
 						<th>Entry Date</th>
 						<th>Total Stock</th>
 						<th>Sold Stock</th>
 						<th>Current Stock</th>
 					</tr>
 					@php 
                      $total_stock_qty = 0; 
                      $total_current_qty = 0; 
                      $total_sold_qty = 0;

 					@endphp
                  @foreach($stock as $value)
 	               <tr>
 	               	<td>{{ $value->product_code }}</td>
 	               	<td>{{ $value->product_name }}</td>
 	               	<td>{{ $value->menu->menu_name ? $value->menu->menu_name : ''  }}</td>
 	               	<td>{{ $value->category->category_name ? $value->category->category_name : ''  }}</td>   

 	                <td>{{ $value->sub_category->sub_category_name ? $value->sub_category->sub_category_name : ''  }}</td> 

 	                <td>{{ date("d F Y", strtotime($value->created_at)) }}</td>


 	                <td>{{ $value->quantity  }}</td>
 	                <td>{{ $sold_quantity = get_sold_quantity($value->id) }}</td>
 	                <td>{{ $current_quantity = $value->quantity - $sold_quantity  }}</td>
 	                	 
 	               </tr>
 	               @php
                  
                  $total_stock_qty += $value->quantity;
                  $total_sold_qty  += $sold_quantity;
                  $total_current_qty  += $current_quantity;

 	              @endphp


 				  @endforeach
 				  <tr style="color: #fff;background-color: #000;font-weight: bold;">
 				  	 <td colspan="6" class="text-right">Total=</td>
 				  	 <td>{{ $total_stock_qty }}</td>
 				  	 <td>{{ $total_sold_qty }}</td>
 				  	 <td>{{ $total_current_qty }}</td>
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