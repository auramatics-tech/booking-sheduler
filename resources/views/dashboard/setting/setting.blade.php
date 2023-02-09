@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    {{ __('dash.setting') }}

@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">
                <a href="{{ route('setting.general') }}"> {{ __('dash.setting') }}
                </a>
            </h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
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

        <div class="card">
            <div class="card-body">

                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{ route('setting.post') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="">

                        <div class="row mg-b-20">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <label for="projectinput1">
                                            {{ __('dash.photo') }}</label>

                                        <input class="custom-file-input" name="photo" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">Choose
                                            photo</label>
                                    </div>
                                </div>
                            </div>


                            <div class="parsley-input col-md-4" id="fnWrapper">
                                <label>{{ __('dash.name_app') }}
                                    : <span class="tx-danger"></span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name_app"
                                    value="{{ $setting->name_app ?? '' }}" type=" text">
                            </div>

                            <div class="parsley-input col-md-4" id="fnWrapper">
                                <label>{{ __('dash.email') }}
                                    : <span class="tx-danger"></span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="email"
                                    value="{{ $setting->email ?? '' }}" type="text">
                            </div>

                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ __('dash.phone') }}: <span class="tx-danger"></span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="phone"
                                    value="{{ $setting->phone ?? '' }}" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.skype_id') }}: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="skype_id" value="{{ $setting->skype_id ?? '' }}" type="text">
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.kako_link') }}: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="kako_link" value="{{ $setting->kako_link ?? '' }}" type="text">
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.chat_link') }}: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="chat_link" value="{{ $setting->chat_link ?? '' }}" type="text">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.address') }}: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="address" value="{{ $setting->address ?? '' }}" type="text">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.operating_hours') }}: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="operating_hours" value="{{ $setting->operating_hours ?? '' }}" type="text">
                        </div>

                    </div>




                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-main-primary pd-x-20" type="submit"> {{ __('dash.confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
