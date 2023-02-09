@extends('layouts.master2')

@section('title')
    {{ __('dash.login') }}
@stop


@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'Home')) }}"><img
                                                src="{{ URL::asset('xd/logo.png') }}" class="sign-favicon ht-40"
                                                alt="logo"></a>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <div>
                                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    <a hreflang="{{ $localeCode }}" class="tag mb-2"
                                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                @endforeach
                                            </div>

                                            <h2>
                                                {{ __('dash.welcome') }}

                                            </h2>
                                            <h5 class="font-weight-semibold mb-4">
                                                {{ __('dash.login') }}
                                            </h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label> {{ __('dash.userorname') }} </label>
                                                    <input id="login" type="text"
                                                        class="form-control @error('login') is-invalid @enderror"
                                                        name="login" value="{{ old('login') }}" required
                                                        autocomplete="login" autofocus>
                                                    @error('login')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label> {{ __('dash.password') }}</label>

                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('dash.rm') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('dash.login') }}
                                                </button>
                                                <div class="row row-xs">
                                                    {{-- <div class="col-sm-6">
                                                        <button
                                                            onclick='location.href="{{ route('socialLogin.redirect', 'kakao') }}"'
                                                            style="background: #D3CB3A;color: black"
                                                            class="btn btn-block"><i class="fab fa-kakao-talk-k"></i>
                                                            Signup with kakaotalk</button>
                                                    </div> --}}

                                                </div>
                                            </form>

                                            <div class="main-signup-footer mt-5">
                                                <p> {{ __('dash.noAcc') }} <a href="{{ route('register') }}">
                                                        {{ __('dash.register') }} </a></p>

                                                

                                                <p > {{ __('dash.fpass') }} <a href="{{ url('/password/reset') }}">
                                                        {{ __('dash.rest') }} </a></p>
                                            </div>

                                        </div>
                                    </div>
                                    <p class="mt-5"> {{ __('dash.noAccTeac') }} <a href="{{ route('tc_reg') }}">
                                        {{ __('dash.registerTeach') }} </a></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('xd/logo.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                            alt="logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
