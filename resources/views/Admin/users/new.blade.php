@extends('layouts.admin-main')
@section('title')
    Teachify - New User
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
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
            <div class="container-fluid table-responsive">
                <h2>Add User</h2>
             @if(request()->query('id') == '2')
                    <div class="card">
                        <div class="card-body">
                            <h4>Admin</h4>
                            @include('partials.alerts')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <h6>{{ $error }}</h6>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.users.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="2" name="id">
                                <div class="form-group has-success">
                                    <label for="name" class="control-label mb-1">User Full Name</label>
                                    <input id="name" name="name" type="text" class="form-control name valid">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">User Email</label>
                                    <input id="email" name="email" type="email" class="form-control number identified visa" value="" >
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Add User</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(request()->query('id') == '3')
                    <div class="card">
                        <div class="card-body">
                            <h4>Field Agents</h4>
                            @include('partials.alerts')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <h6>{{ $error }}</h6>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.users.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="3" name="id">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">User Full Name</label>
                                    <input placeholder="Enter Full Name" id="name" name="name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">User Email</label>
                                    <input id="email" placeholder="Enter Email Address" name="email" type="email" class="form-control number identified visa" value="" >
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input id="phone" placeholder="Enter Phone Number" type="text" class="form-control @error('text') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="text">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="u-form-select-wrapper" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="u-form-select-wrapper" name="state">
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select
                                        onchange="toggleLGA(this);"
                                        name="district"
                                        id="state"
                                        class="form-control"
                                    >
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="EKITINorth">EKITI North</option>
                                        <option value="EKITICentral">EKITI Central</option>
                                        <option value="EKITISouth">EKITI South</option>
                                        <option value="LAGOSCentral">LAGOS Central</option>
                                        <option value="LAGOSEast">LAGOS East</option>
                                        <option value="LAGOSWest">LAGOS West</option>
                                        <option value="OGUNCentral">OGUN Central</option>
                                        <option value="OGUNEast">OGUN East</option>
                                        <option value="OGUNWest">OGUN West</option>
                                        <option value="ONDONorth">ONDO North</option>
                                        <option value="ONDOCentral">ONDO Central</option>
                                        <option value="ONDOSouth">ONDO South</option>
                                        <option value="OSUNCentral">OSUN Central</option>
                                        <option value="OSUNEast">OSUN East</option>
                                        <option value="OSUNWest">OSUN West</option>
                                        <option value="OYOCentral">OYO Central</option>
                                        <option value="OYONorth">OYO North</option>
                                        <option value="OYOSouth">OYO South</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LGA</label>
                                    <select
                                        name="lga"
                                        id="lga"
                                        class="form-control select-lga"
                                        required
                                    >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Agent</label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Add User</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(request()->query('id') == '4')
                    <div class="card">
                        <div class="card-body">
                            <h4>Agents</h4>
                            @include('partials.alerts')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <h6>{{ $error }}</h6>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.users.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="4" name="id">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">User Full Name</label>
                                    <input placeholder="Enter Full Name" id="name" name="name" type="text" class="form-control name valid">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">User Email</label>
                                    <input placeholder="Enter Email Address" id="email" name="email" type="email" class="form-control number identified visa" value="" >
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input id="phone" placeholder="Enter Phone Number" type="text" class="form-control @error('text') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="text">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="u-form-select-wrapper" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="u-form-select-wrapper" name="state">
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select
                                        onchange="toggleLGA(this);"
                                        name="district"
                                        id="state"
                                        class="form-control"
                                    >
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="EKITINorth">EKITI North</option>
                                        <option value="EKITICentral">EKITI Central</option>
                                        <option value="EKITISouth">EKITI South</option>
                                        <option value="LAGOSCentral">LAGOS Central</option>
                                        <option value="LAGOSEast">LAGOS East</option>
                                        <option value="LAGOSWest">LAGOS West</option>
                                        <option value="OGUNCentral">OGUN Central</option>
                                        <option value="OGUNEast">OGUN East</option>
                                        <option value="OGUNWest">OGUN West</option>
                                        <option value="ONDONorth">ONDO North</option>
                                        <option value="ONDOCentral">ONDO Central</option>
                                        <option value="ONDOSouth">ONDO South</option>
                                        <option value="OSUNCentral">OSUN Central</option>
                                        <option value="OSUNEast">OSUN East</option>
                                        <option value="OSUNWest">OSUN West</option>
                                        <option value="OYOCentral">OYO Central</option>
                                        <option value="OYONorth">OYO North</option>
                                        <option value="OYOSouth">OYO South</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LGA</label>
                                    <select
                                        name="lga"
                                        id="lga"
                                        class="form-control select-lga"
                                        required
                                    >
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Add User</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(request()->query('id') == '5')
                    <div class="card">
                        <div class="card-body">
                            <h4>Schools</h4>
                            @include('partials.alerts')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <h6>{{ $error }}</h6>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h6>Import Schools(Excel) - Name, Email, Phone Number, Bank, Account Number, Address</h6>
                            <form action="{{ url('users/import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="5" name="id">
                                <div class="form-group">
                                    <label class="control-label">Select Agent</label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Field Agent</label>
                                    <select name="fieldagent_id" id="fieldagent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($fieldagents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="u-form-select-wrapper" name="state">
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select
                                        onchange="toggleLGA(this);"
                                        name="district"
                                        id="state"
                                        class="form-control"
                                    >
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="EKITINorth">EKITI North</option>
                                        <option value="EKITICentral">EKITI Central</option>
                                        <option value="EKITISouth">EKITI South</option>
                                        <option value="LAGOSCentral">LAGOS Central</option>
                                        <option value="LAGOSEast">LAGOS East</option>
                                        <option value="LAGOSWest">LAGOS West</option>
                                        <option value="OGUNCentral">OGUN Central</option>
                                        <option value="OGUNEast">OGUN East</option>
                                        <option value="OGUNWest">OGUN West</option>
                                        <option value="ONDONorth">ONDO North</option>
                                        <option value="ONDOCentral">ONDO Central</option>
                                        <option value="ONDOSouth">ONDO South</option>
                                        <option value="OSUNCentral">OSUN Central</option>
                                        <option value="OSUNEast">OSUN East</option>
                                        <option value="OSUNWest">OSUN West</option>
                                        <option value="OYOCentral">OYO Central</option>
                                        <option value="OYONorth">OYO North</option>
                                        <option value="OYOSouth">OYO South</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LGA</label>
                                    <select
                                        name="lga"
                                        id="lga"
                                        class="form-control select-lga"
                                        required
                                    >
                                    </select>
                                </div>
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">Import Schools</button>
                            </form>
                            <hr/>
                            <h6>Add Single School</h6>
                            <form action="{{ route('admin.users.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="5" name="id">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">School Full Name</label>
                                    <input placeholder="Enter Full Name" id="name" name="name" type="text" class="form-control name valid">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">School Email</label>
                                    <input placeholder="Enter Email Address" id="email" name="email" type="email" class="form-control number identified visa" value="" >
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Select Agent</label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Field Agent</label>
                                    <select name="fieldagent_id" id="fieldagent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($fieldagents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input id="bank" placeholder="Enter Bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{ old('bank') }}" required autocomplete="text">
                                </div>
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input id="account_no" placeholder="Enter Account Number" type="text" class="form-control @error('account_no') is-invalid @enderror" name="account_no" value="{{ old('account_no') }}" required autocomplete="text">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="u-form-select-wrapper" name="state">
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select
                                        onchange="toggleLGA(this);"
                                        name="district"
                                        id="state"
                                        class="form-control"
                                    >
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="EKITINorth">EKITI North</option>
                                        <option value="EKITICentral">EKITI Central</option>
                                        <option value="EKITISouth">EKITI South</option>
                                        <option value="LAGOSCentral">LAGOS Central</option>
                                        <option value="LAGOSEast">LAGOS East</option>
                                        <option value="LAGOSWest">LAGOS West</option>
                                        <option value="OGUNCentral">OGUN Central</option>
                                        <option value="OGUNEast">OGUN East</option>
                                        <option value="OGUNWest">OGUN West</option>
                                        <option value="ONDONorth">ONDO North</option>
                                        <option value="ONDOCentral">ONDO Central</option>
                                        <option value="ONDOSouth">ONDO South</option>
                                        <option value="OSUNCentral">OSUN Central</option>
                                        <option value="OSUNEast">OSUN East</option>
                                        <option value="OSUNWest">OSUN West</option>
                                        <option value="OYOCentral">OYO Central</option>
                                        <option value="OYONorth">OYO North</option>
                                        <option value="OYOSouth">OYO South</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LGA</label>
                                    <select
                                        name="lga"
                                        id="lga"
                                        class="form-control select-lga"
                                        required
                                    >
                                    </select>
                                </div>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Enter School Address"></textarea>
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Add User</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(request()->query('id') == '6')
                    <div class="card">
                        <div class="card-body">
                            <h4>Teachers</h4>
                            @include('partials.alerts')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <h6>{{ $error }}</h6>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h6>Import Teachers(Excel) - Name, Email, Phone Number, BVN, DOB, Gender, Address</h6>
                            <form action="{{ url('users/import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="6" name="id">
                                <div class="form-group">
                                    <label class="control-label">Select School</label>
                                    <select name="school_id" id="school_id" class="form-control" required>
                                        <option></option>
                                        @foreach($schools as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Agent</label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Field Agent</label>
                                    <select name="fieldagent_id" id="fieldagent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($fieldagents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="u-form-select-wrapper" name="state">
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select
                                        onchange="toggleLGA(this);"
                                        name="district"
                                        id="state"
                                        class="form-control"
                                    >
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="EKITINorth">EKITI North</option>
                                        <option value="EKITICentral">EKITI Central</option>
                                        <option value="EKITISouth">EKITI South</option>
                                        <option value="LAGOSCentral">LAGOS Central</option>
                                        <option value="LAGOSEast">LAGOS East</option>
                                        <option value="LAGOSWest">LAGOS West</option>
                                        <option value="OGUNCentral">OGUN Central</option>
                                        <option value="OGUNEast">OGUN East</option>
                                        <option value="OGUNWest">OGUN West</option>
                                        <option value="ONDONorth">ONDO North</option>
                                        <option value="ONDOCentral">ONDO Central</option>
                                        <option value="ONDOSouth">ONDO South</option>
                                        <option value="OSUNCentral">OSUN Central</option>
                                        <option value="OSUNEast">OSUN East</option>
                                        <option value="OSUNWest">OSUN West</option>
                                        <option value="OYOCentral">OYO Central</option>
                                        <option value="OYONorth">OYO North</option>
                                        <option value="OYOSouth">OYO South</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LGA</label>
                                    <select
                                        name="lga"
                                        id="lga"
                                        class="form-control select-lga"
                                        required
                                    >
                                    </select>
                                </div>
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">Import Teachers</button>
                            </form>
                            <hr/>
                            <h6>Add Single Teacher</h6>
                            <form action="{{ route('admin.users.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="6" name="id">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Teacher Full Name</label>
                                    <input placeholder="Enter Full Name" id="name" name="name" type="text" class="form-control name valid">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Teacher Email</label>
                                    <input placeholder="Enter Email Address" id="email" name="email" type="email" class="form-control number identified visa" value="" >
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input id="phone" placeholder="Enter Phone Number" type="text" class="form-control @error('text') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select School</label>
                                    <select name="school_id" id="school_id" class="form-control" required>
                                        <option></option>
                                        @foreach($schools as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Agent</label>
                                    <select name="agent_id" id="agent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Field Agent</label>
                                    <select name="fieldagent_id" id="fieldagent_id" class="form-control" required>
                                        <option></option>
                                        @foreach($fieldagents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="u-form-select-wrapper" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="u-form-select-wrapper" name="state">
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <select
                                        onchange="toggleLGA(this);"
                                        name="district"
                                        id="state"
                                        class="form-control"
                                    >
                                        <option value="" selected="selected">- Select -</option>
                                        <option value="EKITINorth">EKITI North</option>
                                        <option value="EKITICentral">EKITI Central</option>
                                        <option value="EKITISouth">EKITI South</option>
                                        <option value="LAGOSCentral">LAGOS Central</option>
                                        <option value="LAGOSEast">LAGOS East</option>
                                        <option value="LAGOSWest">LAGOS West</option>
                                        <option value="OGUNCentral">OGUN Central</option>
                                        <option value="OGUNEast">OGUN East</option>
                                        <option value="OGUNWest">OGUN West</option>
                                        <option value="ONDONorth">ONDO North</option>
                                        <option value="ONDOCentral">ONDO Central</option>
                                        <option value="ONDOSouth">ONDO South</option>
                                        <option value="OSUNCentral">OSUN Central</option>
                                        <option value="OSUNEast">OSUN East</option>
                                        <option value="OSUNWest">OSUN West</option>
                                        <option value="OYOCentral">OYO Central</option>
                                        <option value="OYONorth">OYO North</option>
                                        <option value="OYOSouth">OYO South</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LGA</label>
                                    <select
                                        name="lga"
                                        id="lga"
                                        class="form-control select-lga"
                                        required
                                    >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="dob">Date Of Birth (DD/MM/YYY)</label>
                                    <input type="text" name="dob" id="dob" placeholder="Enter Teacher Date Of Birth">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="bvn">BVN</label>
                                    <input type="text" name="bvn" id="bvn" placeholder="Enter Teacher BVN">
                                </div>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Enter School Address"></textarea>
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Add User</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    No User Type Account Selected

                @endif            </div>
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
