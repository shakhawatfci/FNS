 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')

 <div class="row">
   <div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Create Sub Category</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @include('errors.validation_errors')
      <form class="form-horizontal" action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="box-body">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Chose Menu</label>

          <div class="col-sm-10">
           <select class="form-control" name="menu" required="" id="menu">
             <option value="">Select Menu</option>
             @foreach($menu as $value)
             <option value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
         </div>
       </div>     


       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>

        <div class="col-sm-10">
         <select class="form-control" name="category" required="" id="category">
           <option value="">Select Category</option>

         </select>
       </div>
     </div>       

     <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Sub Category Name</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Sub Category Name" name="sub_category_name">
      </div>
    </div> 


    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Home View</label>

      <div class="col-sm-10">
       <select class="form-control" name="home_view">
         <option value="0">No</option>
         <option value="1">Yes</option>

       </select>
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
