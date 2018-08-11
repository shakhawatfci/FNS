    <div class="row">
    	<div class="col-md-12">

    		@foreach($product as $value)
    		@php
             

            $sold_quantity = App\OrderDetails::where('product_id','=',$value->id)->sum('sold_quantity');

             $current_qty = $value->quantity - $sold_quantity; 



    		@endphp
			<div class="col-sm-6 col-md-3">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">{{ $value->product_code }}</span></h4>
					<img src="{{ asset('productImage/'.$value->product_image) }}" class="img-responsive" style="height: 250px;">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>Qty:{{ $current_qty }}</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>P:{{ $value->selling_price }}</label></h3>

							</div>
						</div>
						<p style="font-weight: bold">{{ $value->product_name }}</p>
						<p>{{ $value->menu->menu_name ? $value->menu->menu_name : 'Undifined'  }} -> {{ $value->category->category_name ? $value->category->category_name : 'Undifined'  }} -> {{ $value->sub_category->sub_category_name ? $value->sub_category->sub_category_name : 'Undifined'  }}</p>
						<div class="row">
							<div class="col-md-6">
								<a href="{{ route('product.edit',$value->id) }}" class="btn btn-primary btn-product"><i class="fa fa-edit"></i></a> 
								<a onclick="return confirm('Are You Sure?')" href="{{ route('product.delete',$value->id) }}" class="btn btn-danger btn-product"><i class="fa fa-trash"></i></a> 
							</div>
							<div class="col-md-6">
								<a  class="btn btn-success btn-product">Details</a></div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>

			@endforeach

            
        </div> 

        <div class="col-md-12 text-center">
        	{{ $product->links() }}
        </div>

	</div>