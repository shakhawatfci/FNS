@extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Slider List</h3>
 				<a href="{{ route('slider.create') }}" class="pull-right btn btn-primary">Create New</a>
 			</div>

 			<div class="box-body">
 					<div class="table-responsive">
 		<table class="table table-striped table-bordered bs-datatable" style="width:100%">
        <thead>
            <tr>
                <th style="width: 25%;">Slider Title</th>
                <th style="width: 25%;"> Link</th>
                <th style="width: 40%;">Image</th>
                <th style="width: 5%;">Edit</th>
                <th style="width: 5%;">Delete</th>
            </tr>
        </thead>
        <tbody>
         
          @foreach($slider as $value)
        	<tr>
        		<td>{{ $value->title }}</td>
            <td>{{ $value->link }}</td>
        		<td><img class="img-responsive" src="{{ url('sliderImage/'.$value->image) }}" style="height: 120px; width: 100%;"></td>
        		<td><a href="{{ route('slider.edit',$value->id) }}" class="btn btn-primary">Edit</a></td>
        		<td><a onclick="return confirm('are you sure?')" href="{{ route('slider.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
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



