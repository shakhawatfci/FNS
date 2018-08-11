 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')

 <div class="row">
   <div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Update Sub Category</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @include('errors.validation_errors')
      <form class="form-horizontal" action="{{ route('sub-category.update',$sub_category->id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
       {{ csrf_field() }}
       <div class="box-body">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Chose Menu</label>

          <div class="col-sm-10">
           <select class="form-control" name="menu" required="" id="menu">
             <option value="">Select Menu</option>
             @foreach($menu as $value)
             <option @if($sub_category->menu_id == $value->id) selected @endif  value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
         </div>
       </div>     


       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>

        <div class="col-sm-10">
         <select class="form-control" name="category" required="" id="category">
           <option value="">Select Category</option>
           @foreach($category as $value)
            <option @if($value->id == $sub_category->category_id) selected @endif value="{{ $value->id }}">{{ $value->category_name }}</option>
           @endforeach 
         </select>
       </div>
     </div>       

     <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Sub Category Name</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Sub Category Name" name="sub_category_name" value="{{ $sub_category->sub_category_name }}">
      </div>
    </div> 


    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Home View</label>

      <div class="col-sm-10">
       <select class="form-control" name="home_view">
         <option @if($sub_category->home_view == 0) selected @endif value="0">No</option>
         <option @if($sub_category->home_view == 1) selected @endif value="1">Yes</option>

       </select>
     </div>
   </div>    


   <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Status</label>

      <div class="col-sm-10">
       <select class="form-control" name="status">
         <option @if($sub_category->status == 0) selected @endif value="0">Inactive</option>
         <option @if($sub_category->status == 1) selected @endif value="1">Active</option>

       </select>
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
</div>
</div>




@endsection
