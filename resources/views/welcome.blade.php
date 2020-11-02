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
                                            <a class="font-weight-bold" style="color: #ec632e" href="/">
                                                Teachify NG
                                            </a>
                                        </div>
                                        <div class="login-form">
                                            @include('partials.alerts')
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                </div>
                                            @endif
                                            <form action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input id="email" placeholder="Enter Email Address" type="email" class="au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input id="password" placeholder="Enter Password" type="password" class="au-input au-input--full @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                </div>
                                                <div class="login-checkbox pl-5">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <a style="color: #ec632e" class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                                    <a style="color: #ec632e" class="btn btn-link" href="{{ route('register') }}">
                                                        Sign Up
                                                    </a>
                                                <button class="au-btn au-btn--block m-b-20 zeev-btn" type="submit">Login Now</button>
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
