<table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Adress</th>
                <th>Join Date</th>
                <th>Total Order</th>
                <th>View Order</th>
            </tr>
        </thead>
        <tbody>
         
          @foreach($user as $value)
        	<tr>

        		<td>{{ $value->name }}</td>
        		<td>{{ $value->email }}</td>
        		<td>{{ $value->phone }}</td>
        		<td>{{ $value->address }}</td>
        		<td>{{ date("d F Y", strtotime($value->created_at)) }}</td>
        		<td>{{ user_order($value->id) }}</td>
        	<!-- 	<td><a href="" class="btn btn-warning"><i class="fa fa-check"></i></a></td> -->
        		<td><a  href="{{ route('user.order',$value->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
        		
        
  
        	</tr>

          @endforeach	

        </tbody>
        </table> 	

        {{  $user->links() }}