 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
   <div class="row">
   	 <div class="col-md-6 col-md-offset-3">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('errors.validation_errors')
            <form class="form-horizontal" action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
            	<input type="hidden" name="_method" value="PUT">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Chose Menu</label>

                  <div class="col-sm-10">
                   <select class="form-control" name="menu">
                       <option value="">Select Menu</option>
                        @foreach($menu as $value)
                         <option @if($category->menu_id==$value->id) selected @endif  value="{{ $value->id }}" >{{ $value->menu_name }}</option>
                        @endforeach
                   </select>
                  </div>
                </div>       

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Menu Name" name="category_name" value="{{ $category->category_name }}">
                  </div>
                </div> 


                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Home View</label>

                  <div class="col-sm-10">
                   <select class="form-control" name="home_view">
                       <option @if($category->home_view==0) selected @endif value="0">No</option>
                       <option @if($category->home_view==1) selected @endif value="1">Yes</option>
                       
                   </select>
                  </div>
                </div> 
                   

                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                   <select class="form-control" name="status">
                       <option @if($category->status==0) selected @endif value="0">Iactive</option>
                       <option @if($category->status==1) selected @endif value="1">Active</option>
                       
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