 @extends('admin.master.master')
 <!-- Small boxes (Stat box) -->

 @section('content')
     
   <div class="row">
   	 <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Slider</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('errors.validation_errors')
            <form class="form-horizontal" action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
            	{{ csrf_field() }}
            	<input type="hidden" name="_method" value="PUT">
              <div class="box-body">
      

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Slider Title</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Menu Name" name="title" value="{{ $slider->title }}">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Slider Link</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Menu Name" name="link" value="{{ $slider->link }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Slider Link</label>

                  <div class="col-sm-5">
                    <img src="{{ url('sliderImage/'.$slider->image) }}" class="img-responsive" style="height: 150px;">
                    
                  </div>
                  <div class="col-sm-4">
                    <input type="file"  name="img">
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