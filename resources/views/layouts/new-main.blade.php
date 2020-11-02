<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url('') }}/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/argon.css?v=1.2.0" type="text/css">
    <!--- Datatable --->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <style>
        .bg-primary{
            background-color: #ea7832 !important;
        }
    </style>
</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header align-items-center">
            <a class="" href="{{ route('home') }}">
                <img src="{{ url('teachify.png') }}" style="max-height: 5em;">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" id="dropdown">
                        <a class="nav-link" data-toggle="collapse" href="#dropdown-lvl2">
                            <i class="ni ni-fat-add text-gray"></i>
                            <span class="nav-link-text">Add Users</span>
                        </a>
                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    <li>
                                        <a class="nav-link" href="{{ route('superadmin.users.create','id=1') }}">Add Super Admins</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('superadmin.users.create', 'id=2') }}">Add Admins</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('superadmin.users.create', 'id=3') }}">Add Field Agents</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('superadmin.users.create', 'id=4') }}">Add Agents</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('superadmin.users.create', 'id=5') }}">Add Schools</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('superadmin.users.create', 'id=6') }}">Add Teachers</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.users.index') }}">
                            <i class="ni ni-money-coins text-dark"></i>
                            <span class="nav-link-text">All Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.superadmins.index') }}">
                            <i class="ni ni-circle-08 text-orange"></i>
                            <span class="nav-link-text">Super Admins</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.admins.index') }}">
                            <i class="ni ni-single-02 text-primary"></i>
                            <span class="nav-link-text">Admins</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.fieldagents.index') }}">
                            <i class="ni ni-delivery-fast text-yellow"></i>
                            <span class="nav-link-text">Field Agents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.agents.index') }}">
                            <i class="ni ni-shop text-default"></i>
                            <span class="nav-link-text">Agents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.schools.index') }}">
                            <i class="ni ni-hat-3 text-info"></i>
                            <span class="nav-link-text">Schools</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.teachers.index') }}">
                            <i class="ni ni-paper-diploma text-pink"></i>
                            <span class="nav-link-text">Teachers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('messages') }}">
                            <i class="ni ni-chat-round text-danger"></i>
                            <span class="nav-link-text">Complaints</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-settings-gear-65 text-dark"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>


<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                              <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ url('main-page/user.png') }}">
                              </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="{{ url('profile', Auth::user()->id) }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-power"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    @yield('content')
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ url('') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ url('') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('') }}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{ url('') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{ url('') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="{{ url('') }}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ url('') }}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="{{ url('') }}/assets/js/argon.js?v=1.2.0"></script>


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
<script src="{{ url('') }}/js/lga.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

</body>

</html>
