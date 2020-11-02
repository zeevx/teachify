<!DOCTYPE html>
<html lang="en">

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('')}}/main-page/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('')}}/main-page/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('')}}/main-page/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('')}}/main-page/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('')}}/main-page/css/theme.css" rel="stylesheet" media="all">
    <!--- Datatable --->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo">
                    <a href="#">
                        Teachify NG
                    </a>
                </div>
                <div class="header__navbar">
                    <ul class="list-unstyled">
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-tachometer-alt"></i>Menu
                                <span class="bot-line"></span>
                            </a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.users.index') }}">All Users</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.superadmins.index') }}">Super Admins</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.admins.index') }}">Admins</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.fieldagents.index') }}">Field Agents</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.agents.index') }}">Agents</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.teachers.index') }}">Teachers</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.schools.index') }}">Schools</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-user-plus"></i>Add
                                <span class="bot-line"></span>
                            </a>
                            <ul class="header3-sub-list list-unstyled">
                                <li>
                                    <a href="{{ route('superadmin.users.create','id=1') }}">Add Super Admins</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.users.create', 'id=2') }}">Add Admins</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.users.create', 'id=3') }}">Add Field Agents</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.users.create', 'id=4') }}">Add Agents</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.users.create', 'id=5') }}">Add Schools</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.users.create', 'id=6') }}">Add Teachers</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-gears"></i>
                                <span class="bot-line"></span>Settings</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-user"></i>
                                <span class="bot-line"></span>Profile</a>
                        </li>
                    </ul>
                </div>
                <div class="header__tool">
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ url('') }}/main-page/user.png"/>
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ url('') }}/main-page/user.png" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ Auth::user()->name }}</a>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER DESKTOP-->
    <!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        Teachify NG
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="chart.html">
                            <i class="fas fa-chart-bar"></i>Charts</a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-table"></i>Tables</a>
                    </li>
                    <li>
                        <a href="form.html">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                    </li>
                    <li>
                        <a href="map.html">
                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Pages</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>UI Elements</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none">
        <div class="header__tool">
            <div class="account-wrap">
                <div class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image">
                        <img src="main-page/user.png" />
                    </div>
                    <div class="content">
                        <a class="js-acc-btn" href="#">john doe</a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                            <div class="image">
                                <a href="#">
                                    <img src="main-page/user.png"/>
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="name">
                                    <a href="#">john doe</a>
                                </h5>
                                <span class="email">johndoe@example.com</span>
                            </div>
                        </div>
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="#">
                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                            </div>
                        </div>
                        <div class="account-dropdown__footer">
                            <a href="#">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HEADER MOBILE -->
    <!-- PAGE CONTENT-->
    <div class="page-content--bgf7">
     @yield('content')
        <!-- COPYRIGHT-->
        <section class="p-t-60 p-b-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2020 Teachify. All rights reserved.</p>
                            <p>
                                Powered by <img src="{{ url('') }}/CAPIFLEX.png" class="img-fluid" width="100px">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END COPYRIGHT-->
    </div>
</div>
</body>


<!-- Jquery JS-->
<script src="{{url('')}}/main-page/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{url('')}}/main-page/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="{{url('')}}/main-page/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{url('')}}/main-page/vendor/slick/slick.min.js">
</script>
<script src="{{url('')}}/main-page/vendor/wow/wow.min.js"></script>
<script src="{{url('')}}/main-page/vendor/animsition/animsition.min.js"></script>
<script src="{{url('')}}/main-page/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="{{url('')}}/main-page/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="{{url('')}}/main-page/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="{{url('')}}/main-page/vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{url('')}}/main-page/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{url('')}}/main-page/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="{{url('')}}/main-page/vendor/select2/select2.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>







<!-- Main JS-->
<script src="{{ url('') }}/main-page/js/main.js"></script>

</body>

</html>
<!-- end document-->
