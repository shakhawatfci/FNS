 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')

 <div class="row">
   <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Update  Product</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @include('errors.validation_errors')
      <form class="form-horizontal" action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
       {{ csrf_field() }}
       <div class="box-body">

        <div class="form-group">

          <div class="col-sm-4">
          <label for="inputEmail3" class=" control-label">Chose Menu</label>

           <select class="form-control" name="menu" required="" id="menu">
             <option value="">Select Menu</option>
             @foreach($menu as $value)
             <option @if($value->id==$product->menu_id) selected @endif value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
         </div>
         <div class="col-sm-4">
        <label for="inputEmail3" class="control-label">Select Category</label>
        <select class="form-control" name="category" required="" id="category">
           <option value="">Select Category</option>
           @foreach($category as $value)  
           <option @if($value->id==$product->category_id) selected @endif value="{{ $value->id }}">{{ $value->category_name }}</option>
           @endforeach
         </select>
       </div>
       <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Sub Category Name</label>
        <select class="form-control" name="subcategory" required="" id="subcategory">
          <option value="">Select Category</option>

          @foreach($sub_category as $value)  
           <option @if($value->id==$product->sub_category_id) selected @endif value="{{ $value->id }}">{{ $value->sub_category_name }}</option>
           @endforeach

        </select>
      </div>
    </div>   

    <div class="form-group">
      <div class="col-sm-8">
        <label for="inputEmail3" class=" control-label">product Name</label>
        <input type="text" name="name"  class="form-control" value="{{ $product->product_name }}">
      </div>

      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">product Code</label>
        <input type="text" name="code" class="form-control" value="{{ $product->product_code }}" placeholder="Ex. PT-1204">
      </div>

      

    </div>

    <div class="form-group">
      

      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Discount (Optional)</label>
        <input type="text" name="discount" class="form-control" value="{{ $product->discount ? $product->discount : '0' }}" placeholder="In %">
      </div>

      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Current Quantity</label>
        <input type="text"  class="form-control" value="{{ $current_quantity }}" disabled=""> <a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-info">+/-</a>
      </div>
      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Buying Price</label>
        <input type="text" name="buying_price" class="form-control" value="{{ $product->buying_price }}" placeholder="BDT">
      </div>

      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Selling Price</label>
        <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}" placeholder="BDT">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Product Size</label>
        <select name="size[]" class="form-control select2" multiple="">
          @foreach($size as $value)
          @php
             if(in_array($value->id,$product_size)) $str_flag = "selected";
         
          else $str_flag="";
          @endphp
          <option value="{{ $value->id }}" {{ $str_flag }}>{{ $value->sizes }}</option>
          @endforeach
          
          
        </select>
      </div>      


      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Status</label>
        <select name="status" class="form-control">
         
          <option @if($product->status==1) selected @endif value="1">active</option>
          <option @if($product->status==0) selected @endif value="0">inactive</option>
  
          
          
        </select>
      </div>
 
    </div>

    <div class="form-group">
        <div class="col-md-12">
           <img src="{{ asset('productImage/'.$product->product_image) }}" class="img-responsive" style="height: 80px;"> 
        <label for="inputEmail3" class=" control-label">Change Product image</label>
        <input type="file" name="imgreq" class="form-control">
      
  

      </div>
      </div>

      <div class="form-group">
        <div class="col-md-12">
         
          @forelse($product_image as $value)
          <div class="col-md-1">
             <img src="{{ asset('productImage/'.$value->image) }}" class="img-responsive img-thumbnail" style="height: 80px;"> 

             <a onclick="return confirm('are you sure to delete this image?')" href="{{ route('product.image.delete',$value->id) }}" class="pull-right" style="color: red"><i class="fa fa-trash"></i></a>

          </div>   

          @empty
              
          @endforelse
        
        </div>
        <div class="col-md-12">
        <label for="inputEmail3" class=" control-label">Upload More Image(Optional)</label>
        <input type="file" class="form-control"  name="imgopt[]" multiple="">
       </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label for="inputEmail3" class=" control-label">Product Short description</label>
        <textarea class="form-control" name="shortdesc">{{ $product->short_description }}</textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <label for="inputEmail3" class=" control-label">Product description</label>
        <textarea class="form-control textarea" name="description">{{ $product->description }}</textarea>
      </div>
    </div>
    



 </div>
 <!-- /.box-body -->
 <div class="box-footer">
  <button type="submit" class="btn btn-info pull-right">Update</button>
</div>
<!-- /.box-footer -->
</form>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
      <form action="{{ route('quantity.update') }}" method="post">
        {{ csrf_field() }}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Update Quantity</h4>
      </div>
      <div class="modal-body">
      
          <input type="hidden" name="current_quantity" value="{{ $current_quantity }}">
          <input type="hidden" name="id" value="{{ $product->id }}">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Quantity:</label>
            <input type="number" name="quantity" class="form-control" id="recipient-name" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Increment/Decrement:</label>
            <select class="form-control" name="type" required="">
               <option value="">Select Type</option>
               <option value="1">+ Quantity</option>
               <option value="2">- Quantity</option>
            </select>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
 </form>
  </div>
</div>
</div>
</div>

@endsection
