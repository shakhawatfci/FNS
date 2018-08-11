  
   @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Customer List</h3>
 			</div>

 			<div class="box-footer">
   

 				<div class="col-md-4">
 					         <p>Filter</p>
 					<input type="text" class="form-control" id="title" placeholder="Search By Name Phone Or Email">
 				</div>
 				</div>				
 			   <div class="col-md-4"></div>
 				<div class="col-md-4"></div>	

 			<div class="box-body">
 		<div class="table-responsive" id="user">
 		      @include('admin.user.user_paginate')
 			</div>
 			</div>

 		

 		

 		</div>

 	</div>
   </div>
   <script type="text/javascript">


         $(function() {

     $('#user').on('click', '.pagination a', function (e) {
                getData($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });

    $('#title').on('keyup',function(){

         getData(1);

      });  

            });



   function getData(page){
      
      var title = $('#title').val();
      $.ajax({
       
       url:'?page='+page+'&title='+title,
       datatype:"html",
      }).done(function(data){      
         $('#user').html(data);
         $("html, body").animate({ scrollTop: 0 }, 800);
      }).fail(function(){
       
       alert('Server Error');

      });

   }

   // date range picker setup 


   </script>

 @endsection



