@extends('layouts.master')
@section('title')
    {{ __('dash.dash') }}
@stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ __('dash.setting') }}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

                    {{ __('dash.general') }}
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    <!-- row -->
    <div class="row row-sm mt-5">
        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="{{ route('setting.get') }}">
                <div class="card text-center bg-danger-gradient">
                    <div class=" card-body ">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-bar-chart project bg-primary-transparent mx-auto text-primary "></i>
                        </div>
                        <h4 class="mb-1 text-white">
                            {{ __('dash.setting') }}
                        </h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="{{ route('notifications.index') }}">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body ">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-pie-chart project bg-pink-transparent mx-auto text-pink "></i>
                        </div>
                        <h4 class="mb-1 text-white">{{ __('dash.notification') }}</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a href="#">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-pulse  project bg-teal-transparent mx-auto text-teal "></i>
                        </div>
                        <h4 class="mb-1 text-white">{{ __('dash.boards') }}</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="{{ url('/chatify') }}">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i style="color: white; font-size: 22px" class="fa fa-comments" aria-hidden="true"></i>

                        </div>
                        <h4 class="mb-1 text-white">{{ __('dash.liveChat') }}</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="{{ url('/translations') }}">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i style="color: white; font-size: 22px" class="fa fa-comments" aria-hidden="true"></i>

                        </div>
                        <h4 class="mb-1 text-white">{{ __('dash.translations') }}</h6>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- /row -->

    </div>
    </div>
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>



@endsection
