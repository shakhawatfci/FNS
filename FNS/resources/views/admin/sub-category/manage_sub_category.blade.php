  
   @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
        <h3 class="box-title">Category List</h3>
        <a href="{{ route('sub-category.create') }}" class="pull-right btn btn-primary">Create New</a>
      </div>

      <div class="box-header with-border">
      <div class="col-md-4">
           <select class="form-control cat_menu" name="menu" required="" id="menu">
             <option value="">Filter By Menu</option>
             @foreach($menu as $value)
             <option value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
      </div>
      <div class="col-md-4">
          <select class="form-control" name="category" required="" id="category" onchange="return getData(1);">
           <option value="">Filter By Category</option>

         </select>
      </div>
 			<div class="col-md-4">
         <input type="text" class="form-control" id="sub_cat_name" onkeyup="return getData(1);" placeholder="Sub Category Name">  
      </div>
 			</div>

 			<div class="box-body" id="sub_cat">
          @include('admin.sub-category.sub_category_paginate') 
 			</div>

 		

 			<div class="box-footer">
 				
 			</div>

 		</div>

 	</div>
   </div>

 @endsection

 @push('script')
   
   <script type="text/javascript">
      $(function() {

     $('#sub_cat').on('click', '.pagination a', function (e) {
                getData($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });


    $('#menu').on('change',function(){

         getData(1);

      });  

            });



   function getData(page){
      
      var sub_cat_name = $('#sub_cat_name').val();
      var category = $('#category').val();
      var menu = $('#menu').val();


      $.ajax({
       
       url:'?page='+page+'&menu='+menu+'&category='+category+'&sub_cat_name='+sub_cat_name,
       datatype:"html",


      }).done(function(data){
         
         $('#sub_cat').html(data);
         $("html, body").animate({ scrollTop: 0 }, 800);

      }).fail(function(){
       
       alert('Server Error');

      });

   }

   </script>

 @endpush



