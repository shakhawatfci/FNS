 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')

 <div class="row">
   <div class="col-md-12">
    <div class="box box-info" style="margin-top: 50px;">
      <div class="box-header with-border">
        <h3 class="box-title">Get Report</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @include('errors.validation_errors')
      <form class="form-horizontal" action="{{ route('report.get') }}" method="get" enctype="multipart/form-data">
       <div class="box-body">

        <div class="form-group">

          <div class="col-sm-4">
          <label for="inputEmail3" class=" control-label">Report Type</label>

           <select class="select2 form-control" name="type" required="">
             <option value="">Chose Report Type</option>
             <option value="stock">Stock Report</option>
             <option value="sell">Sell Report</option>
             <option value="profit">Profit Report</option>
           </select>
         </div>         


          <div class="col-sm-4">
          <label for="inputEmail3" class=" control-label">Chose Menu (optional)</label>

           <select class="select2 form-control" name="menu" id="menu">
             <option value="">All Menu</option>
             @foreach($menu as $value)
             <option value="{{ $value->id }}">{{ $value->menu_name }}</option>
             @endforeach
           </select>
         </div>
         <div class="col-sm-4">
        <label for="inputEmail3" class="control-label">Select Category (optional)</label>
        <select class="select2 form-control" name="category"  id="category">
           <option value="">All Category</option>
         </select>
       </div>



    </div>   

    <div class="form-group">
    	       <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Sub Category (optional)</label>
        <select class="select2 form-control" name="subcategory"  id="subcategory">
          <option value="">All SubCategory</option>
        </select>
      </div>       


      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Product(optional)</label>
        <select class="select2 form-control" name="product"  id="product">
          <option value="">All Product</option>
        </select>
      </div>
    </div>   


     <div class="form-group">
    	       <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Date From (optional)</label>
        <input type="text" class="form-control datepicker" name="start_date">
      </div>       


      <div class="col-sm-4">
        <label for="inputEmail3" class=" control-label">Dte To (optional)</label>
        <input type="text" class="form-control datepicker" name="end_date">
      </div>
    </div>

    



 </div>
 <!-- /.box-body -->
 <div class="box-footer">
  <button type="submit" class="btn btn-info">Get Report</button>
</div>
<!-- /.box-footer -->
</form>
</div>
</div>
</div>




@endsection

@push('script')
 <script type="text/javascript">
   
  // find product by sub category 

  $(document).ready(function(){

   $('#subcategory').change(function(){

    var id = $(this).val();

    var data_url = "{{ url('admin/get-product') }}"+'/'+id;

    $.ajax({

     url :  data_url,
     datatype : "html"
   }).done(function(data){

    $('#product').html(data);
   }).fail(function(){

     alert('Server Error');

   });

 });

 });
 </script>
@endpush

