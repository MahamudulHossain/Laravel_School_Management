<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Custom Theme Style -->
    <link href="{{asset('assets/admin/build/css/custom.min.css')}}" rel="stylesheet">

    @yield('head_link')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('assets/admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home </a>
                  </li>
                   <li><a><i class="fa fa-user"></i> Setup Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('users_list')}}">Users</span></a></li>
                      <li><a href="{{url('students_list')}}">Students</span></a></li>
                      <li><a href="{{url('employees_list')}}">Emloyees</span></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Setup Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('class_list')}}">Student Class</span></a></li>
                      <li><a href="{{url('year_list')}}">Year</span></a></li>
                      <li><a href="{{url('group_list')}}">Group</span></a></li>
                      <li><a href="{{url('shift_list')}}">Shift</span></a></li>
                      <li><a href="{{url('fee_list')}}">Fees</span></a></li>
                      <li><a href="{{url('fee_amount_list')}}">Fees Amount</span></a></li>
                      <li><a href="{{url('exam_type_list')}}">Exam Type</span></a></li>
                      <li><a href="{{url('subject_list')}}">Subjects</span></a></li>
                      <li><a href="{{url('assign_subject_list')}}">Assign Subjects</span></a></li>
                      <li><a href="{{url('designation_list')}}">Designation</span></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-child"></i> Manage Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('roll_generation_form')}}">Roll generation</span></a></li>
                      <li><a href="{{url('stu_regFee_form')}}">Registration fee</span></a></li>
                      <li><a href="{{url('stu_monthlyFee_form')}}">Monthly fee</span></a></li>
                      <li><a href="{{url('stu_examFee_form')}}">Exam fee</span></a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-child"></i> Manage Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('employee_salary_management')}}">Salary Management</span></a></li>
                      <li><a href="{{url('employee_leave_management')}}">Leave Management</span></a></li>
                      <li><a href="{{url('employee_attend_management')}}">Attendance Management</span></a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/admin/images/img.jpg')}}" alt="">Admin
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{url('/admin/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" >

            @yield('content')

        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('assets/admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('assets/admin/vendors/DateJS/build/date.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('assets/admin/build/js/custom.min.js')}}"></script>
    @yield('scripts')
    
  </body>
</html>            