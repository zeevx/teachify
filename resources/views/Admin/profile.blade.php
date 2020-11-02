@extends('layouts.admin-main')
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
                                        @can('superadmin')
                                            @if($user->verified == "false")
                                                <form action="{{ route('verify') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                                    <button class="btn-sm btn-danger"> Unverified </button>
                                                </form>
                                            @else
                                                <form action="{{ route('verify') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                                    <button class="btn-sm btn-success"> Verified </button>
                                                </form>
                                            @endif
                                        @endcan
                                        @can('admin')
                                            @if($user->verified == "false")
                                                <form action="{{ route('verify') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                                    <button class="btn-sm btn-danger"> Unverified </button>
                                                </form>
                                            @else
                                                <form action="{{ route('verify') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                                    <button class="btn-sm btn-success"> Verified </button>
                                                </form>
                                            @endif
                                        @endcan
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
                                @can('admin')
                                <hr class="my-4" />
                                <!-- Change Role -->
                                <h6 class="heading-small text-muted mb-4">User Role</h6>
                                <div class="pl-lg-4">
                                    <form action="{{ route('admin.profile.submit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="form-group">
                                                <label class="form-control-label" for="role">Select User Role</label>
                                                <select name="role" class="form-control">
                                                    <option value="2" @if(in_array('admin', $user->roles()->get()->toArray())) select @endif>Admin</option>
                                                    <option value="3" @if(in_array('fieldagent', $user->roles()->get()->toArray())) selected @endif>Field Agent</option>
                                                    <option value="4" @if(in_array('agent', $user->roles()->get()->toArray())) selected @endif>Agent</option>
                                                    <option value="5" @if(in_array('school', $user->roles()->get()->toArray())) selected @endif>School</option>
                                                    <option value="6" @if(in_array('teacher', $user->roles()->get()->toArray())) selected @endif>Teacher</option>
                                                </select>
                                            </div>
                                        <input type="submit" class="btn btn-success" value="submit">
                                    </form>
                                </div>
                                @if($user->hasRole('fieldagent'))
                                <hr class="my-4" />
                                <!-- Change Agent -->
                                <h6 class="heading-small text-muted mb-4">Agent Assigned</h6>
                                <div class="pl-lg-4">
                                    <form action="{{ route('admin.profile.submit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <label class="form-control-label" for="role">Assign Agent</label>
                                            <select name="agent" class="form-control">
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="submit">
                                    </form>
                                </div>
                                @endif
                                @endcan
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
