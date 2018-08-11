  
   @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Category List</h3>
 				<a href="{{ route('category.create') }}" class="pull-right btn btn-primary">Create New</a>
 			</div>

 			<div class="box-body">
 					<div class="table-responsive">
 		<table class="table table-striped table-bordered bs-datatable" style="width:100%">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Menu</th>
                <th>Home View</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
         
          @foreach($category as $value)
        	<tr>
        		<td>{{ $value->category_name }}</td>
        		<td>{{ $value->menu->menu_name ? $value->menu->menu_name : 'NO'  }}</td>
        		<td>{{ $value->home_view==1 ? 'Yes' : 'No' }}</td>
        		<td>{{ $value->status==1 ? 'Active' : 'Inactive'  }}</td>
        		<td><a href="{{ route('category.edit',$value->id) }}" class="btn btn-primary">Edit</a></td>
        		<td><a onclick="return confirm('are you sure?')" href="{{ route('category.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
        	</tr>

          @endforeach	

        </tbody>
        </table> 	
 			</div>
 			</div>

 		

 			<div class="box-footer">
 				
 			</div>

 		</div>

 	</div>
   </div>

 @endsection



