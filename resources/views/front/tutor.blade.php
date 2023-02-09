@extends('layouts.master3')
@section('css')

@section('title')
    {{ __('dash.tutors') }}
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">
                {{ __('dash.tutors') }} : {{ $data->name }}
            </h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')



<div class="row">

    <div class="col-md-12 mb-4">
        <form action="{{ route('tutors.search') }}" method="POST">

            <div class="col-md-8 m-auto ">
                <div class="card-body pb-0">
                    <div class="input-group mb-2">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="선생님의 성함을 입력 해 주세요.">
                        <span class="input-group-append">
                            <button class="btn ripple btn-primary" type="button">검색</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>

    </div>



    <!-- Col -->
    <div class="col-lg-8 m-auto">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">

                        <div class="d-flex justify-content-between mg-b-20">
                            <div>
                                <div class="main-img-user profile-user">
                                    <img alt=""
                                        src="{{ url('/') }}/uploads/{{ $data->profile->photo ?? 'defalut.png' }}"><a
                                        class="" href="#"></a>
                                </div>

                                <h5 class="main-profile-name">{{ $data->name ?? '----' }}</h5>
                                <br />
                                <h5 class="main-profile-name">
                                    {{ $data->profile->name_ko ?? '----' }}</h5>


                                <p class="main-profile-name-text">
                                    {{ __('dash.email') }} :
                                    {{ $data->email ?? '----' }}
                                </p>

                                <div class="main-profile-contact-list mt-3">
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i class="icon ion-md-phone-portrait"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>전공</span>
                                            <div>
                                                {{ $data->profile->major ?? '----' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i class="icon ion-logo-slack"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>나라</span>
                                            <div>
                                                {{ $data->profile->country ?? '----' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-info-transparent text-info">
                                            <i class="icon ion-md-locate"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>tags</span>
                                            <div>
                                                {{ $data->profile->tags ?? '----' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-info-transparent text-info">
                                            <i class="icon ion-md-locate"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>자기소개</span>
                                            <div>
                                                {{ $data->profile->introduction ?? '----' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <!-- main-profile-bio -->

                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>


        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">

                        <div class="d-flex justify-content-between mg-b-20">
                            <div>

                                <h5 class="main-profile-name">자기소개</h5>
                                <br />
                                <p>
                                    {{ $data->profile->introduction ?? '---' }}
                                </p>

                                <br />


                                <style>
                                    #iframe {
                                        width: 700px;
                                    }

                                    @media only screen and (max-width: 600px) {
                                        #iframe {
                                            width: 100%;
                                        }
                                    }
                                </style>
                                <iframe id="iframe" frameborder="0" allowfullscreen="" class="mt-5 m-auto"
                                    height="315"
                                    src="http://www.youtube.com/embed/{{ $data->profile->youtube_link }}">
                                </iframe>


                            </div>




                        </div>

                        <!-- main-profile-bio -->

                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>


    </div>

    {{-- <div class="col-lg-6">

        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label tx-13 mg-b-25">
                    Conatct
                </div>
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-md-phone-portrait"></i>
                        </div>
                        <div class="media-body">
                            <span>Mobile</span>
                            <div>
                                {{ $data->profile->phone ?? '----' }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-slack"></i>
                        </div>
                        <div class="media-body">
                            <span>Skype Id</span>
                            <div>
                                {{ $data->profile->skype_id ?? '----' }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-md-locate"></i>
                        </div>
                        <div class="media-body">
                            <span>Zoom_url</span>
                            <div>
                                {{ $data->profile->zoom_url ?? '----' }}
                            </div>
                        </div>
                    </div>
                </div><!-- main-profile-contact-list -->
            </div>
        </div>
    </div> --}}




</div>


</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>


@endsection
