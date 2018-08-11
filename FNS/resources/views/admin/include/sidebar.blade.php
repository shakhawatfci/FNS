  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('admin_asset/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::guard('admin')->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li>        

          <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-pie-chart"></i>
            <span>Dashboard</span>
          </a>

        </li>    


        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
           <li><a href="{{ route('menu.create') }}"><i class="fa fa-circle-o"></i>Create Menu</a></li> 


            <li><a href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i>Create Category</a></li> 

            <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i>Manage Category</a></li>

            <li><a href="{{ route('sub-category.create') }}"><i class="fa fa-circle-o"></i>Create Sub Category</a></li>

            <li><a href="{{ route('sub-category.index') }}"><i class="fa fa-circle-o"></i>Manage Sub Category</a></li>
            <li><a href="{{ route('sizes.create') }}"><i class="fa fa-circle-o"></i>Create & Manage Sizes</a></li>
          </ul>
        </li>    

        <li class="treeview">
          <a href="#">
            <i class="fa fa-camera"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('slider.create') }}"><i class="fa fa-circle-o"></i>Create Slider</a></li>
            <li><a href="{{ route('slider.index') }}"><i class="fa fa-circle-o"></i>Manage Slider</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('product.create') }}"><i class="fa fa-circle-o"></i>Create Product</a></li>
            <li><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i>Manage Product</a></li>
          </ul>
        </li>    


        <li class="treeview">
          <a href="#">
            <i class="fa fa-check-circle"></i>
            @php 
             
             $new_order = App\Order::where('status','=',App\AllStatic::$pending)->count();

            @endphp
            <span>Order</span> @if($new_order>0) <span class="badge">{{ $new_order }}</span> @endif
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('order.pending') }}"><i class="fa fa-circle-o"></i>Order Manage</a></li>
        <!--     <li><a href="{{ route('order.delivered') }}"><i class="fa fa-circle-o"></i>Delivered Order</a></li> -->
          </ul>
        </li>  

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Customer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('user.panel') }}"><i class="fa fa-circle-o"></i>Customer List</a></li>


          </ul>
        </li>    


        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('report.all') }}"><i class="fa fa-circle-o"></i>Get All Report</a></li>


          </ul>
        </li>    




  
  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>