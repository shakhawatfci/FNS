 <!-- HOME -->
<div class="container-fluid hidden-xs" style="padding: 0px !important">
	
	<!-- home slick -->
	<div id="home-slick">
	</div>
	@php
        $slider = App\Slider::orderBy('id','desc')->where('status','=',1)->first();
        $sliders = App\Slider::orderBy('id','asc')->where('status','=',1)->take(10)->get();
    @endphp
	<!-- /home slick -->
	<div id="myCarousel" class="carousel slide" data-interval="false">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    @php $i=0; @endphp
	    @foreach($sliders as $title)
	    @php $i++; @endphp
	    <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
	    @endforeach
	  </ol>
	  <div class="carousel-inner">

	  	<div class="item active">
	  		<img src="{{ 'sliderImage/'.$slider->image }}" style="width:100%" class="img-responsive">
	  		<div class="container">
	  			<div class="caraous-title text-center">
	  				<div class="col-md-12">
	  					<h1><span style="background-color: whitesmoke; opacity: .6">{{ $slider->title }}</span></h1>
	  					<br>
	  					<br>
	  					<a class="btn btn-lg btn-primary site-btn" href="{{ $slider->link }}">Learn More</a>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	@foreach($sliders as $data)
	    <div class="item">
	      <img src="{{ 'sliderImage/'.$data->image }}" class="img-responsive">
	      <div class="container">
	        <div class="caraous-title text-center">
	            <div class="col-md-12">
	              <h1 ><span style="background-color: whitesmoke; opacity: .6">{{ $data->title }}</span></h1>\
	                <br>
	                <br>
	              <a class="btn btn-lg btn-primary site-btn" href="{{ $data->link }}">Learn More</a>
	            </div>
	        </div>
	      </div>
	    </div>
	    @endforeach
	    
	  </div>
	  <!-- Controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    <span class="icon-prev"></span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="icon-next"></span>
	  </a>  
	</div>
	
</div>
		<!-- /container -->
<style type="text/css">
.item img {width:100%; max-height:450px;display: block;}
.caraous-title {
    position: absolute;
    top: 40%;
    left: 25px;
    right: auto;
    width: 96.66666666666666%;
    color: #000;
}
.caraous-title h1 {color:#FFF;font-size:45px; font-weight:600;}
.caraous-title span {color:#aa1f43;}
.caraous-img-box img {width:50%;}
/* Button */
.site-btn{padding:12px 25px 12px 25px;border-radius:2px;background:#DF314D;border-color:transparent;font-size:14px;}
.site-btn:hover{background:#C9223D ;border:transparent;}
.site-btn2{padding:12px 25px 12px 25px;border-radius:2px;background:#05681e;border-color:transparent;font-size:14px;}
.site-btn2:hover{background:rgb(128, 197, 71); ;border:transparent;}


</style>