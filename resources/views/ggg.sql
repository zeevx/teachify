@extends('layouts.main')

@section('content')
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                        <form class="au-form-icon--sm" action="" method="post">
                            <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for any user...">
                            <button class="au-btn--submit2" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->
    <!-- WELCOME-->
    <section class="welcome p-t-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-4">Quick
                        <span>Menu</span>
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <!-- END WELCOME-->
    <!-- STATISTIC-->
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--blue">
                        <h2 class="number">{{ count($superAdmins) > 0 ? count($superAdmins) : "O" }}</h2>
                        <a href="{{ route('superadmin.superadmins.index') }}">
                            <span class="desc font-weight-bold">Super Admins</span>
                        </a>
                        <p>
                            They control every function.
                        </p>
                        <div class="icon">
                            <i class="zmdi zmdi-accounts-list-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--green">
                        <h2 class="number">{{ count($admin) > 0 ? count($admin) : "O" }}</h2>
                        <a href="{{ route('superadmin.admins.index') }}">
                            <span class="desc font-weight-bold">Admins</span>
                        </a>
                        <p>
                            They control every function but not as Super Admin.
                        </p>
                        <div class="icon">
                            <i class="zmdi zmdi-account-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--red">
                        <h2 class="number">{{ count($fieldAgents) > 0 ? count($fieldAgents) : "O" }}</h2>
                        <a href="{{ route('superadmin.fieldagents.index') }}">
                            <span class="desc font-weight-bold">Field Agents</span>
                        </a>
                        <p>
                            They collect information of teachers and schools.
                        </p>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--orange">
                        <h2 class="number">{{ count($agents) > 0 ? count($agents) : "O" }}</h2>
                        <a href="{{ route('superadmin.agents.index') }}">
                            <span class="desc font-weight-bold">Agents</span>
                        </a>
                        <p>
                            They collate information of teachers and schools.
                        </p>
                        <div class="icon">
                            <i class="zmdi zmdi-account-box-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--blue">
                        <h2 class="number">{{ count($schools) > 0 ? count($schools) : "O" }}</h2>
                        <a href="{{ route('superadmin.schools.index') }}">
                            <span class="desc font-weight-bold">Schools</span>
                        </a>
                        <p>
                            They view collections made by their teachers.
                        </p>
                        <div class="icon">
                            <i class="zmdi zmdi-book"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--green">
                        <h2 class="number">{{ count($teachers) > 0 ? count($teachers) : "O" }}</h2>
                        <a href="{{ route('superadmin.teachers.index') }}">
                            <span class="desc font-weight-bold">Teachers</span>
                        </a>
                        <div class="icon">
                            <i class="zmdi zmdi-graduation-cap"></i>
                        </div>
                        <p>
                            They view their collections.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC-->
@endsection
