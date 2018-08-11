 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')

 <div class="row">
   <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Create New Product</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @include('errors.validation_errors')
      <form class="form-horizontal" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="box-body">

        <div class="form-group">

          <div class="col-sm-4">
          <label for="inputEmail3" class=" control-label">Chose Menu</label>

           <select class="form-control" name="menu" required="" id="menu">
             <option value="">Select Menu</option>
             @foreach($menu as $value)
             <option value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
         </div>
         <div class="col-sm-4">
        <label for="inputEmail3" class="control-label">Select Category</label>
        <select class="form-control" name="category" required="" id="category">
           <option value="">Select Category</option>
         </select>
       </div>
       <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Sub Category Name</label>
        <select class="form-control" name="subcategory" required="" id="subcategory">
          <option value="">Select Category</option>
        </select>
      </div>
    </div>   

    <div class="form-group">
      <div class="col-sm-8">
        <label for="inputEmail3" class=" control-label">product Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
      </div>

      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">product Code</label>
        <input type="text" name="code" class="form-control" value="{{ old('code') }}" placeholder="Ex. PT-1204">
      </div>

      

    </div>

    <div class="form-group">
      

      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Discount (Optional)</label>
        <input type="text" name="discount" class="form-control" value="{{ old('discount') }}" placeholder="In %">
      </div>

      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Quantity</label>
        <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
      </div>
      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Buying Price</label>
        <input type="text" name="buying_price" class="form-control" value="{{ old('buying_price') }}" placeholder="BDT">
      </div>

      <div class="col-sm-3">
        <label for="inputEmail3" class=" control-label">Selling Price</label>
        <input type="text" name="selling_price" class="form-control" value="{{ old('selling_price') }}" placeholder="BDT">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Product Size</label>
        <select name="size[]" class="form-control select2" multiple="">
          @foreach($sizes as $size)
          <option value="{{ $size->id }}">{{ $size->sizes }}</option>
          @endforeach
          
          
        </select>
      </div>
      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Product image</label>
        <input type="file" name="imgreq" >
      </div>
      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Product image(Optional)</label>
        <input type="file" name="imgopt[]" multiple="">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label for="inputEmail3" class=" control-label">Product Short description</label>
        <textarea class="form-control" name="shortdesc">{{ old('shortdesc') }}</textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <label for="inputEmail3" class=" control-label">Product description</label>
        <textarea class="form-control textarea" name="description">{{ old('description') }}</textarea>
      </div>
    </div>
    



 </div>
 <!-- /.box-body -->
 <div class="box-footer">
  <button type="submit" class="btn btn-info pull-right">save</button>
</div>
<!-- /.box-footer -->
</form>
</div>
</div>
</div>




@endsection
