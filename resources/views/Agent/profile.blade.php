@extends('layouts.agent-main')
@section('title')
    Teachify - Profile
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
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @include('partials.alerts')
        <div class="row">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="{{ url('main-page/user.png') }}" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-100">
                            <div class="text-center">
                                <h5 class="h3">
                                    {{ $user->name }}
                                </h5>
                                <div class="h5 font-weight-300">
                                    Joined in: {{ $user->created_at }}
                                </div>
                                <div>
                                            @if($user->verified == "false")
                                                    <button class="btn-sm btn-danger"> Unverified </button>
                                            @else
                                                    <button class="btn-sm btn-success"> Verified </button>
                                            @endif
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $v)
                                                <label class="mt-2 badge badge-success">{{ $v->name }}</label>
                                            @endforeach
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profile</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="ni ni-user-run"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Full Name</label>
                                                <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                @can('superadmin')
                                                    <input type="email" id="input-email" class="form-control" value="{{ $user->email }}">
                                                @else
                                                <input type="email" id="input-email" class="form-control" value="{{ $user->email }}" disabled>
                                                @endcan
                                            </div>
                                        </div>
                                        <button class="btn btn-success">Update</button>
                                    </div>
                                </div>
                                <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">Other information</h6>
                            <div class="pl-lg-4">
                                <form action="{{ route('submit.faprofile') }}" method="post">
                                    @csrf
                                    <input value="{{$user->id}}" name="id" type="hidden">
                                    <input value="@if(!empty($fieldagent->agent_id)){{$fieldagent->agent_id}}@endif" name="agent_id" type="hidden">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="phone">Phone Number</label>
                                            <input id="phone" name="phone" type="text" value="@if(!empty($fieldagent->phone)){{ $fieldagent->phone  }} @endif" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="gender">Gender</label>
                                            <input class="form-control" name="gender" value="@if(!empty($fieldagent->gender)){{ $fieldagent->gender }}@endif">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="state">State</label>
                                            <input id="state" name="state" type="text" value="@if(!empty($fieldagent->state)){{ $fieldagent->state }}@endif" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="lga">LGA</label>
                                            <input class="form-control" name="lga" value="@if(!empty($fieldagent->lga)){{ $fieldagent->lga }}@endif" disabled>
                                        </div>
                                    </div>
                                    <button class="btn btn-success">Update</button>
                                </div>
                                </form>
                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">Teachers</h6>
                            <div class="pl-lg-4">
                            @foreach($teachers as $teacher)
                                <p>{{ $teacher->name  }}</p>
                                @endforeach
                            </div>
                            <hr class="my-4" />
                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">New Password</label>
                                                <input type="text" id="input-first-name" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Confirm Password</label>
                                                <input type="text" id="input-last-name" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success">Update</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>        </div>
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
