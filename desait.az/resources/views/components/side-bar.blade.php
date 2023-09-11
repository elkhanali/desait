<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('back/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->





    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



        <li class="nav-item">
          <a href="{{route('portfoliocategories.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Portfolio Categories
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('bannerslider.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Banner Slider
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('servicesboxes.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Services Boxes
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('services.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Services
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('workprocess.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Work Process Box
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('blogboxes.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Blog Boxes
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('portfolioboxes.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Portfolio Boxes
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('employers.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Employers
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('choseus.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Chose us
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('servicescategories.index')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Services Category
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.logout')}}" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Log Out
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>