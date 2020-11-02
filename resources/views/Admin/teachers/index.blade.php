@extends('layouts.admin-main')
@section('title')
    Teachify - Teachers
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
                                <li class="breadcrumb-item active" aria-current="page">All Teachers</li>
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
                        <h3 class="mb-0">All Teachers</h3>
                    </div>
                    <div class="container-fluid table-responsive">
                        <table id="example" class="table align-items-center" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->verified == "false")
                                            <button class="btn-sm btn-danger"> Unverified </button>
                                        @else
                                            <button class="btn-sm btn-success"> Verified </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $v)
                                                <label class="badge badge-success">{{ $v->name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn-sm btn-outline-primary"> Edit/View </button>
                                        <button class="btn-sm btn-outline-danger"> Delete </button>
                                    </td>
                                </tr>
                            @empty
                                No Data Available
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                            </tfoot>
                        </table>
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
