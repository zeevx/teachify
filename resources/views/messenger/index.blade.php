@extends('layouts.admin-main')
@section('title')
    Teachify - Agents
@endsection


@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Complaints @include('messenger.unread-count')</li>
                                <li class="breadcrumb-item"><a href="{{ url('messages/create') }}">Create New Complaint</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Complaints</h3>
                    </div>
                    <div>
                        @include('messenger.partials.flash')
                        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="{{ route('home') }}" class="font-weight-bold ml-1" target="_blank">Teachify</a> Powered by <img src="{{ url('') }}/CAPIFLEX.png" class="img-fluid" width="100px">
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
