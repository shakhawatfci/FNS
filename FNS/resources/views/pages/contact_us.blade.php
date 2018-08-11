@extends('master.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Profile</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section" >
    <!-- container -->
  <div class="container-fluid">
    <div class="contact-pageheader">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="contact-caption">
              <h1 class="contact-title">Have any Question?</h1>
              <p class="contact-text">Here is a few approaches to get in touch with us. It would be ideal if you send an email, fill the contact form <strong>We are looking forward to speaking with you.</strong>
              </p>
            </div>
          </div>
          <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
            <div class="contact-form">
              <h3 class="contact-info-title">Contact Me</h3>
              <div class="row">
                <form>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class="control-label sr-only " for="Name"></label>
                      <input id="name" type="text" placeholder="Name" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class="control-label sr-only " for="email"></label>
                      <input id="email" type="text" placeholder="Email" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class="control-label sr-only " for="Phone"></label>
                      <input id="phone" type="text" placeholder="Phone" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                    <div class="form-group">
                      <label class="control-label sr-only" for="textarea"></label>
                      <textarea class="form-control pdt20" id="textarea" name="textarea" rows="4" placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <button class="btn btn-primary btn-lg ">Send message</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="space-medium">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb60">
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.879225232384!2d90.38318041452422!3d23.751685884588724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c766dae163a9%3A0x6f0612fa8107b57c!2sSmart+Software+Inc!5e0!3m2!1sen!2sbd!4v1533844743278" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6 col-xs-12">
            <div class="">
              <h3 class="title-bold">Contact Info</h3>
              <p>Please help us serve you better by sharing the following information.
              </p>
            </div>
            <div class="contact-section">
              <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
              <div class="contact-info">
                <p>951 Meadow View Drive Bristol, Hog Camp Road USA06010</p>
              </div>
            </div>
            <div class="contact-section">
              <div class="contact-icon"><i class="fa fa-phone"></i></div>
              <div class="contact-info">
                <p>+180-123-4567</p>
              </div>
            </div>
            <div class="contact-section">
              <div class="contact-icon"><i class="fa fa-envelope"></i></div>
              <div class="contact-info">
                <p>john@lifecoach.com</p>
              </div>
            </div>
          </div>
        </div>
        
        </div>
      </div>
  </div>
</div>
 
<link rel="stylesheet" type="text/css" href="{{ url('home_asset/css/contact.css') }}">
@endsection 