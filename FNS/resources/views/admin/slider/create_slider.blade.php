 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
   <div class="row">
   	 <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Slider</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('errors.validation_errors')
            <form class="form-horizontal" action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Select Image</label>

                  <div class="col-sm-10">
                    <input type="file"  id="inputEmail3" name="img">
                  </div>
                </div>        

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Slider title (Optional )</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="title">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Slider Link</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Link" name="link">
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


 

 @endsection