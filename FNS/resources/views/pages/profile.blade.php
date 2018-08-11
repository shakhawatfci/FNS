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
<div class="section" style="background-color: #ECF0F5">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="col-xs-3" >
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left" id="tabMenu">
                <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                <li><a href="#list" data-toggle="tab">Order List</a></li>
                <li><a href="#details" data-toggle="tab">Order Details</a></li>
                <li><a href="#password" data-toggle="tab">Change Password</a></li>
            </ul>
        </div>
        <div class="col-xs-9 img-thumbnail" style="margin-bottom: 25px;">
            <!-- Tab panes -->
            <div class="tab-content ">
              <div class="tab-pane active" id="profile">
                <div class="col-md-8 col-md-offset-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="row text-uppercase text-center">
                        <h4 class="page-header">
                          <i class="fa fa-user-circle"></i> Your Profile

                        </h4>

                      </div>

                      <div class="row ">
                        <div class="col-md-12">
                          <form>
                            <div class="form-group row">
                              <label for="username" class="col-4 col-form-label"> Name*</label> 
                              <div class="col-8">
                                <input id="username" name="username" value="{{ Auth::user()->name }}" class="input" required="required" type="text">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="lastname" class="col-4 col-form-label">Email</label> 
                              <div class="col-8">
                                <input id="lastname" name="email" value="{{ Auth::user()->email }}" placeholder="Email" class="input" type="email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="text" class="col-4 col-form-label">mobile</label> 
                              <div class="col-8">
                                <input id="text" name="mobile" placeholder="Mobile No." value="{{ Auth::user()->phone }}" class="input" required="required" type="text">
                              </div>
                            </div>


                            <div class="form-group row">
                              <label for="publicinfo" class="col-4 col-form-label">Address</label> 
                              <div class="col-8">
                                <textarea id="publicinfo" name="publicinfo"  class="input" style="height: 150px;">{{ Auth::user()->address }}</textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="primary-btn pull-right">Update My Profile</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              
            <div class="tab-pane" id="list">

                  <div class="card">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-xs-12 text-center">
                          <h4 class="page-header">
                            <i class="fa fa-globe"></i> Your order
                          </h4>
                        </div>
                        <!-- /.col -->
                      </div>
                      <div class="row" style="max-height:400px; overflow-y: scroll;">
                        <div class="col-md-12">
                          <table class="table table-striped table-responsive">
                            <tr>
                              <th>Order Id.</th>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Oder date</th>
                              <th>Total Amount</th>
                              <th>Payment</th>
                              <th>Action</th>
                            </tr>
                           

                          
                            @foreach($order as $orders)
                            <tr>
                              <td>{{ $orders->id }}</td>
                              <td>{{ $orders->name }}</td>
                              <td>{{ $orders->phone }}</td>
                              <td>{{ $orders->order_date }}</td>
                              <td>{{ get_order_total($orders->id,$orders->delivery_cost) }}</td>
                              <td>{{ $orders->order_date }}</td>
                              <td>
                                <button class="btn btn-info btn-sm" href="#success" data-toggle="modal"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>

                              </td>
                            </tr>

                            
                            @endforeach

                            
                            

                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="details">

                <div class="card">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="page-header">
                          <i class="fa fa-globe"></i> Order Id: 1001
                          <small class="pull-right">Order Date: 04 August 2018 </small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>


                    <div class="row p-5">
                      <div class="col-md-12">
                        <table class="table table-striped table-responsive">
                          <thead>
                            <tr>
                              <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                              <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                              <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                              <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                              <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                              <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Software</td>
                              <td>LTS Versions</td>
                              <td>21</td>
                              <td>$321</td>
                              <td>$3452</td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Software</td>
                              <td>Support</td>
                              <td>234</td>
                              <td>$6356</td>
                              <td>$23423</td>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Software</td>
                              <td>Sofware Collection</td>
                              <td>4534</td>
                              <td>$354</td>
                              <td>$23434</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white">

                      <div class="col-md-3">
                        
                      </div>
                      <div class="col-md-3 text-right">
                          <p><strong>Grand Total</strong></p>
                          <p>$140</p>
                      </div>
                      <div class="col-md-3 text-right">
                          <p><strong>Shipping</strong></p>
                          <p>$140</p>
                      </div>
                        <div class="col-md-3 text-right">
                            <p><strong>Grand Total</strong></p>
                            <p>$140</p>
                        </div>
                      </div>
                    </>
                  </div>
                </div>
                
              </div>

                <div class="tab-pane" id="password">

                  <div class="card">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-xs-12 text-center">
                          <h4 class="page-header">
                            <i class="fa fa-key"></i> Change Password
                          </h4>
                        </div>
                        <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3">
                          <form>
                            <div class="form-group row">
                              <label for="password" class="col-4 col-form-label"> Old Password*</label> 
                              <div class="col-8">
                                <input id="password" name="old_password" placeholder="Old Password" class="input" required="required" type="password">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="password" class="col-4 col-form-label"> New Password*</label> 
                              <div class="col-8">
                                <input id="password" name="new_password" placeholder="New Password" class="input" required="required" type="password">
                              </div>
                            </div>

                            

                            <div class="form-group row">
                              <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="primary-btn pull-right">Change password</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <div class="clearfix"></div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<style type="text/css">

.tabs-left, .tabs-right {
  border-bottom: none;
  padding-top: 2px;
}
.tabs-left {
  border-right: 1px solid #ddd;
}

.tabs-left>li, .tabs-right>li {
  float: none;
  margin-bottom: 2px;
}
.tabs-left>li {
  margin-right: -1px;
}

.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
  border-bottom-color: #ddd;
  border-right-color: transparent;
}

.tabs-right>li.active>a,
.tabs-right>li.active>a:hover,
.tabs-right>li.active>a:focus {
  border-bottom: 1px solid #ddd;
  border-left-color: transparent;
}
.tabs-left>li>a {
  border-radius: 4px 0 0 4px;
  margin-right: 0;
  display:block;
}

.vertical-text {
  margin-top:50px;
  border: none;
  position: relative;
}
.vertical-text>li {
  height: 20px;
  width: 120px;
  margin-bottom: 100px;
}
.vertical-text>li>a {
  border-bottom: 1px solid #ddd;
  border-right-color: transparent;
  text-align: center;
  border-radius: 4px 4px 0px 0px;
}
.vertical-text>li.active>a,
.vertical-text>li.active>a:hover,
.vertical-text>li.active>a:focus {
  border-bottom-color: transparent;
  border-right-color: #ddd;
  border-left-color: #ddd;
}
.vertical-text.tabs-left {
  left: -50px;
}

.vertical-text.tabs-right>li {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.vertical-text.tabs-left>li {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);
}
</style>
@endsection

@push('script')

<script>
 //redirect to specific tab
 $(document).ready(function () {
 $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
 });
</script>
 
@endpush 