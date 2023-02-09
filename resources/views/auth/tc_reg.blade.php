@extends('layouts.master2')

@section('title')
    {{ __('dash.register') }}
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
            <div class="col-md-4 col-lg-4 col-xl-5 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('xd/logo.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                            alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-8 col-lg-8 col-xl-7 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="index.html"><img
                                                src="{{ URL::asset('xd/logo.png') }}" class="sign-favicon ht-40"
                                                alt="logo"></a>
                                    </div>
                                    <div class="main-signup-header">

                                        <div>
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a hreflang="{{ $localeCode }}" class="tag mb-2"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            @endforeach
                                        </div>


                                        <h2 class="text-primary">
                                            {{ __('dash.noAccTeac') }}
                                        </h2>


                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                    type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>Error</strong>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf



                                            <div class="form-group">
                                                <label>{{ __('dash.username') }} </label> <input class="form-control"
                                                    placeholder="Enter your username" value="{{ old('username') }}"
                                                    name="username" type="text">
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('dash.name') }} </label> <input class="form-control"
                                                    placeholder="Enter your Name" value="{{ old('name') }}"
                                                    name="name" type="text">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('dash.email') }} </label>
                                                <input value="{{ old('email') }}" class="form-control"
                                                    placeholder="Enter your email" type="email" name="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('dash.password') }} </label> <input class="form-control"
                                                    placeholder="Enter your password" type="password" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password </label> <input class="form-control" type="password"
                                                    name="password_confirmation" />

                                            </div>
                                            {{-- <div class="form-group">
                                                <label> {{ __('dash.type') }} </label>
                                                <label class="rdiobox">
                                                    <input name="type" value="Student" type="radio"> <span>
                                                        Student</span></label>
                                                <label class="rdiobox">
                                                    <input name="type" value="Teacher" type="radio"> <span>
                                                        Teacher</span></label>


                                            </div> --}}
                                            <input name="type" value="Teacher" type="hidden">
                                            <button type="submit" class="btn btn-main-primary btn-block">
                                                {{ __('dash.register') }}
                                            </button>

                                        </form>
                                        <div class="main-signup-footer mt-5">
                                            <p>Already have an account? <a href="{{ route('login') }}">
                                                    {{ __('dash.login') }} </a></p>
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

    </div>
@endsection
@section('js')
@endsection
