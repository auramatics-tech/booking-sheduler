@extends('layouts.master2')

@section('title')
    {{ __('dash.fpass') }}
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
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('xd/logo.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                            alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="mb-5 d-flex"> <a href="index.html"><img src="{{ URL::asset('xd/logo.png') }}"
                                            class="sign-favicon ht-40" alt="logo"></a>
                                </div>
                                <div class="main-card-signin d-md-flex bg-white">
                                    <div class="wd-100p">

                                        <div>
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a hreflang="{{ $localeCode }}" class="tag mb-2"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            @endforeach
                                        </div>

                                        <div class="main-signin-header">
                                            <h2> {{ __('dash.forgetPass') }}</h2>
                                            <h4>{{ __('dash.forPh') }}</h4>


                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('dash.email') }}</label>
                                                    <input value="{{ old('email') }}" name="email" type="email"
                                                        id="email" class="form-control"
                                                        placeholder="{{ __('dash.email') }}" type="text">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <button type="submit"
                                                    class="btn btn-main-primary btn-block">{{ __('dash.send') }}</button>
                                            </form>
                                        </div>


                                        <div class="main-signup-footer mg-t-20">
                                            <p><a href="{{ route('login') }}">
                                                    {{ __('dash.login') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
