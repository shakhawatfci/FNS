 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
   <div class="row">
   	 <div class="col-md-6 col-md-offset-3">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('errors.validation_errors')
            <form class="form-horizontal" action="{{ route('menu.store') }}" method="post">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Menu Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Menu Name" name="name">
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


   <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Menu List</h3>
 			</div>

 			<div class="box-body">
 					<div class="table-responsive">
 				<table class="table table-bordered table-hover table-condensed">
 					<tr>
 						<th>Menu Name</th>
 						<th>Status</th>
            <th>Update</th>
 						<th>Delete</th>
 					</tr>
                  @foreach($menu as $value)
 					<tr>
 						<form action="{{ route('menu.update',$value->id) }}" method="post">
 							{{ csrf_field() }}
 							<input type="hidden" name="_method" value="PUT">
 						<td><input class="form-control" value="{{ $value->menu_name }}" type="text" name="name"></td>
 					
 						<td>
                        <select class="form-control" name="status">
 							<option @if($value->status == 1) selected  @endif value="1">Active</option>
 							<option @if($value->status == 0) selected  @endif value="0">Inactive</option>
 						</select>
 			

 						</td>

 						<td>
 					     <button type="submit" class="btn btn-success">Update</button>
 					   </td>

 					   </form>
             <td>
               <a href="{{ route('menu.delete',$value->id) }}" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
             </td>
 					</tr>

 					@endforeach
 				</table>
 			</div>
 			</div>

 		

 			<div class="box-footer">
 				<h3>{{ $menu->links() }}</h3>
 			</div>

 		</div>

 	</div>
   </div>

 @endsection