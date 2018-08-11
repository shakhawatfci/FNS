 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
   <div class="row">
   	 <div class="col-md-6 col-md-offset-3">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Sizes</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('errors.validation_errors')
            <form class="form-horizontal" action="{{ route('sizes.store') }}" method="post">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Create Size</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ex. XL" name="sizes">
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
 				<h3 class="box-title">Sizes List</h3>
 			</div>

 			<div class="box-body">
 					<div class="table-responsive">
 				<table class="table table-bordered table-hover table-condensed">
 					<tr>
 						<th>Sizes</th>
            <th>Update</th>
 						<th>Delete</th>
 					</tr>
                  @foreach($sizes as $value)
 					<tr>
 						<form action="{{ route('sizes.update',$value->id) }}" method="post">
 							{{ csrf_field() }}
 							<input type="hidden" name="_method" value="PUT">
 						<td><input class="form-control" value="{{ $value->sizes }}" type="text" name="sizes"></td>

            <td>
 					     <button type="submit" class="btn btn-success">Update</button>
 					   </td>

 					   </form>
             <td>
               <a href="{{ route('sizes.destroy',$value->id) }}" onclick="return confirm('Are You Sure To Delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
             </td>
 					</tr>

 					@endforeach
 				</table>
 			</div>
 			</div>

 		

 			<div class="box-footer">
 				<h3>{{ $sizes->links() }}</h3>
 			</div>

 		</div>

 	</div>
   </div>

 @endsection