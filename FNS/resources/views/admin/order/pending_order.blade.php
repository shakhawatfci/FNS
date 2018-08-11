  
   @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
  <div class="row">
   	 
 	<div class="col-md-12">

 		<div class="box box-info">
 			<div class="box-header with-border">
 				<h3 class="box-title">Order List</h3>
 			</div>

 			<div class="box-footer">
   

 				<div class="col-md-4">
 	        
          <div class="form-group">
            <p>Filter By Status</p>

           <select class="form-control" name="status" id="status">
             <option value="">Select Status</option>
             <option value="0">Pending</option>
             <option value="1">Delivered</option>
           </select>
          </div>

        </div>				
 					<div class="col-md-4">
        <div class="form-group">
            <p>Filter By Order Id</p>
 						<input type="text" name="order_id" id="order_id" placeholder="Search By Order Id" class="form-control">
 					</div>

 				</div>
 				<div class="col-md-4">
          <p>Filter By Date Range</p>
 					<input type="text" class="form-control pull-right" id="date_range" placeholder="Search By Date Range">
 				</div>
 				
 			</div>	

 			<div class="box-body">
 		<div class="table-responsive" id="order">
 		      @include('admin.order.pending_paginate')
 			</div>
 			</div>

 		

 		

 		</div>

 	</div>
   </div>
   <script type="text/javascript">

      $(document).ready(function(){
       


       $('#date_range').daterangepicker({

       });

        $('#date_range').val(' ');
  
      });
      // pagination 

         $(function() {

     $('#order').on('click', '.pagination a', function (e) {
                getData($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });


    $('#date_range,#status').on('change',function(){

         getData(1);

      });  

    $('#order_id').on('keyup',function(){

         getData(1);

      });  

            });



   function getData(page){
      
      var status = $('#status').val();
      var date = $('#date_range').val();
      var order_id = $('#order_id').val();


      $.ajax({
       
       url:'?page='+page+'&status='+status+'&date='+date+'&order_id='+order_id,
       datatype:"html",
      }).done(function(data){      
         $('#order').html(data);
         $("html, body").animate({ scrollTop: 0 }, 800);
      }).fail(function(){
       
       alert('Server Error');

      });

   }

   // date range picker setup 


   </script>

 @endsection



