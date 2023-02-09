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
            <h4 class="content-title mb-0 my-auto"> {{ __('dash.tutors') }}
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

    @if (count($data) > 0)
        @foreach ($data as $t)
            <div class="col-sm-12 col-xl-4 col-lg-12">
                <div class="card user-wideget user-wideget-widget widget-user">
                    <div class="widget-user-header bg-primary">
                        <h3 class="widget-user-username" style="cursor: pointer;"
                            onclick='location.href="{{ route('tutors.show', $t->id) }}"'>
                            {{ $t->name }}</h3>
                        <h6 class="widget-user-desc">{{ $t->email }}</h5>
                    </div>
                    <div class="widget-user-image">
                        {{-- {{ route('tutors.show', $t->id) }} --}}
                        <img style="cursor: pointer;" onclick='location.href="{{ route('tutors.show', $t->id) }}"'
                            src="{{ url('/') }}/uploads/{{ $t->profile->photo ?? 'defalut.png' }}"
                            class="brround" alt="User Avatar">
                    </div>
                    <div class="user-wideget-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $t->profile->major ?? '----' }}</h5>
                                    <h5 class="description-text"> {{ __('dash.major') }}</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $t->profile->country ?? '----' }}</h5>
                                    <h5 class="description-text">{{ __('dash.country') }} </h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        @if ($t->profile->youtube_link)
                                            <a target="_new"
                                                href="http://www.youtube.com/embed/{{ $t->profile->youtube_link }}">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        @else
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        @endif
                                    </h5>
                                    <span class="description-text">

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col md-8" m-auto>
            <div class="alert alert-solid-warning" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span></button>
                <strong>No!</strong> No data was found .
            </div>
        </div>
    @endif

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
