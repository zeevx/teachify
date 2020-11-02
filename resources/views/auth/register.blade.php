@include('layouts.head')
<body class="u-body">
<section class="u-clearfix u-image u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-section-2" id="carousel_e4a9">
    <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
            <div class="u-layout-row">
                <div class="u-align-left u-container-style  u-left-cell u-size-27-xl u-layout-cell-1">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a class="" href="{{ route('home') }}">
                                    <img src="{{ url('teachify.png') }}" width="150px">
                                </a>
                                <p>Teaching for Excellence</p>
                            </div>
                            <div class="login-form">
                                @include('partials.alerts')
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input id="name" placeholder="Enter Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" placeholder="Enter Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
                                        <label>Password</label>
                                        <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label>Are you a Field Agent?</label>
                                        <select name="agent" id="agent" class="u-form-select-wrapper" required>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                        <a style="color: #ec632e" class="btn btn-link" href="/">
                                            Login
                                        </a>
                                    <button class="zeev-btn au-btn au-btn--block m-b-20" type="submit">Register Now</button>
                                </form>
                            </div>
                            <p align="center" class="pt-2">
                                Powered by <img src="{{ url('') }}/CAPIFLEX.png" class="img-fluid" width="100px">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="u-container-style u-image u-layout-cell u-right-cell u-size-29-lg u-size-29-md u-size-29-sm u-size-29-xs u-size-33-xl u-image-1">
                    <div class="u-container-layout u-container-layout-2"></div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.foot')
