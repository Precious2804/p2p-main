<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Lucrative Forum</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{URL::asset('asset/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{URL::asset('asset/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/css/components.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/bundles/izitoast/css/iziToast.min.css')}}">

  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{URL::asset('asset/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{URL::asset('favicon.ico')}}" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Admin</div>
              <a href="#" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin/dashboard') }}"> <img alt="image" src="{{URL::asset('assets/img/logo.png')}}" class="header-logo" /> <span
                class="logo-name"></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('admin/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>Manage Users</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin/create_user') }}">Create User</a></li>
                <li><a class="nav-link" href="{{ route('admin/manage_users') }}">Users Table</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="plus-square"></i><span>Create Help Requests</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin/create_help') }}">Create Provide Request</a></li>
                <li><a class="nav-link" href="{{ route('admin/create_get') }}">Create Get Request</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="eye"></i><span>Manage Pending Requests</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" style="font-weight: bold;" href="{{ route('admin/all_helps') }}">Pending Provide Requests</a></li>
                <li><a class="nav-link" style="font-weight: bold;" href="{{ route('admin/all_gets_table') }}">Merge Get Requests</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin/view_provided') }}" class="nav-link"><i data-feather="monitor"></i><span>Completed Provide Helps</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin/referral_manage') }}" class="nav-link"><i data-feather="monitor"></i><span>Referral System</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin/testimonial') }}" class="nav-link"><i data-feather="eye"></i><span>Testimonial/Statistics</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('admin/settings') }}" class="nav-link"><i data-feather="settings"></i><span>General Settings</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('logout') }}" class="nav-link"><i data-feather="settings"></i><span>Logout</span></a>
            </li>

            
          </ul>
        </aside>
      </div>

      @yield('content')
      
      <footer class="main-footer">
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{URL::asset('asset/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{URL::asset('asset/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{URL::asset('asset/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{URL::asset('asset/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{URL::asset('asset/js/custom.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/izitoast/js/iziToast.min.js')}}"></script>

  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="{{URL::asset('asset/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/export-tables/jszip.min.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('asset/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('asset/js/page/datatables.js')}}"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>