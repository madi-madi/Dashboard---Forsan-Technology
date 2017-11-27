  
     {{--main seting--}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>


     {{--user Setting--}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>User Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class=""><a href="{{url('/admin-cp/all-users')}}"><i class="fa fa-circle-o"></i> All Users</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>


     {{--Product Setting--}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Product Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class=""><a href="{{url('/admin-cp/add-new-product')}}"><i class="fa fa-circle-o"></i> Add Product</a></li>
            <li><a href="{{url('/admin-cp/all-product')}}"><i class="fa fa-circle-o"></i> All Product </a></li>
          </ul>
        </li>
