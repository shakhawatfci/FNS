			<div class="table-responsive">
 		<table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Category</th>
                <th>Sub Category Name</th>
                <th>Home View</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
         
          @foreach($sub_category as $value)
        	<tr>
        		
                <td>{{ $value->menu->menu_name ? $value->menu->menu_name : 'NO'  }}</td>
        		<td>{{ $value->category->category_name ? $value->category->category_name : 'NO'  }}</td>
                <td>{{ $value->sub_category_name }}</td>
        		<td>{{ $value->home_view==1 ? 'Yes' : 'No' }}</td>
        		<td>{{ $value->status==1 ? 'Active' : 'Inactive'  }}</td>
        		<td><a href="{{ route('sub-category.edit',$value->id) }}" class="btn btn-primary">Edit</a></td>
        		<td><a onclick="return confirm('are you sure?')" href="{{ route('sub-category.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
        	</tr>

          @endforeach	

        </tbody>
        </table> 	
 			</div>

            {{ $sub_category->links() }}