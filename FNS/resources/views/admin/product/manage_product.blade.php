@extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Product List</h3>
 				<a href="{{ route('product.create') }}" class="pull-right btn btn-primary">Create New</a>
 			</div>

 			<div class="box-footer">
 				        <div class="col-md-3">
          <label for="inputEmail3" class=" control-label">Chose Menu</label>

           <select class="form-control" name="menu" required="" id="menu">
             <option value="">Select Menu</option>
             @foreach($menu as $value)
             <option value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
         </div>
         <div class="col-md-3">
        <label for="inputEmail3" class="control-label">Select Category</label>
        <select class="form-control" name="category" required="" id="category">
           <option value="">Select Category</option>
         </select>
       </div>
       <div class="col-md-3">
        <label for="inputEmail3" class=" control-label">Sub Category Name</label>
        <select class="form-control" name="subcategory" required="" id="subcategory">
          <option value="">Select Category</option>
        </select>
      </div> 


      <div class="col-md-3">
        <label for="inputEmail3" class=" control-label">Product Code</label>
        <input type="text" id="code" name="" class="form-control" placeholder="Product Code">
      </div>
 			</div>

 			<div class="box-body" id="all_product">
             @include('admin.product.paginate')
 			</div>

 		

 			

 		</div>

 	</div>
   </div>

 @endsection

 @push('script')
  
  <script type="text/javascript">
   

      $(function() {

     $('#all_product').on('click', '.pagination a', function (e) {
                getData($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });


    $('#menu,#category,#subcategory').on('change',function(){

         getData(1);

      });  

    $('#code').on('keyup',function(){

         getData(1);

      });  

            });



   function getData(page){
      
      var sub_category = $('#subcategory').val();
      var category = $('#category').val();
      var menu = $('#menu').val();
      var code = $('#code').val();


      $.ajax({
       
       url:'?page='+page+'&menu='+menu+'&category='+category+'&sub_category='+sub_category+'&code='+code,
       datatype:"html",


      }).done(function(data){
         
         $('#all_product').html(data);
         $("html, body").animate({ scrollTop: 0 }, 800);

      }).fail(function(){
       
       alert('Server Error');

      });

   }

   </script>



 @endpush



