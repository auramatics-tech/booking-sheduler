@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@endsection
@section('title')
    {{ __('dash.editprof') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ __('dash.dash') }} </h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">
                    {{ __('dash.editprof') }}
                </span>
            </div>

        </div>


    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="">
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">
                                        {{ __('dash.editprof') }}
                                    </h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('update.profile') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $admin->id }}">

                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ __('dash.name') }}</label>
                                                            <input type="text" value="{{ $admin->name }}"
                                                                id="value" class="form-control" placeholder="  "
                                                                name="name">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.email') }} </label>
                                                            <input type="text" value="{{ $admin->email }}"
                                                                id="value" class="form-control" placeholder="  "
                                                                name="email">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.password') }}
                                                            </label>
                                                            <input type="password" class="form-control" name="password">
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.confrimPass') }} </label>
                                                            <input type="password" class="form-control" placeholder="  "
                                                                name="password_confirmation">

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ __('dash.edit') }}
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- *------------- --}}
                </section>
                <!-- // Basic form layout section end -->

                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">
                                        {{ __('dash.moreinof') }}
                                    </h4>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('update.profile') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id1" value="{{ $admin1->id }}">
                                            <input type="hidden" name="type" value="2">

                                            <div class="form-body">
                                                <div class="row">


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <img width="70" height="70"
                                                                src="{{ url('/') }}/uploads/{{ Auth()->user()->profile->photo }}" />

                                                            <div class="custom-file">
                                                                {{-- <label for="projectinput1">
                                                                {{ __('dash.photo') }}</label>
                                                            <input class="custom-file-input" name="photo"
                                                                id="customFile" type="file"> <label
                                                                class="custom-file-label" for="customFile">Choose
                                                                photo</label> --}}
                                                                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                                                                    <label for="projectinput1">
                                                                        {{ __('dash.photo') }}</label>
                                                                    <input name="photo" type="file" class="dropify"
                                                                        data-default-file="{{ url('/') }}/assets/img/photos/1.jpg"
                                                                        data-height="200" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ __('dash.name_ko') }}</label>
                                                            <input type="text" value="{{ $admin1->name_ko }}"
                                                                id="value" class="form-control" placeholder="  "
                                                                name="name_ko">
                                                            @error('name_ko')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.name_en') }} </label>
                                                            <input type="text" value="{{ $admin1->name_en }}"
                                                                id="value" class="form-control" placeholder="  "
                                                                name="name_en">
                                                            @error('name_en')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.skype_id') }} </label>
                                                            <input type="text" value="{{ $admin1->skype_id }}"
                                                                id="value" class="form-control" placeholder="  "
                                                                name="skype_id">
                                                            @error('skype_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.zoom_url') }}
                                                            </label>
                                                            <input value="{{ $admin1->skype_id }}" type="text"
                                                                class="form-control" name="zoom_url">
                                                            @error('zoom_url')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                {{ __('dash.phone') }} </label>
                                                            <input value="{{ $admin1->phone }}" type="text"
                                                                class="form-control" placeholder="  " name="phone">

                                                        </div>
                                                    </div>

                                                    @if (auth()->user()->hasRole('Student'))
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    {{ __('dash.cash_receipt_number') }} </label>
                                                                <input value="{{ $admin1->cash_receipt_number }}"
                                                                    type="text" class="form-control" placeholder="  "
                                                                    name="cash_receipt_number">

                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>



                                                @if (auth()->user()->hasRole('Teacher'))
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    {{ __('dash.major') }}
                                                                </label>
                                                                <input value="{{ $admin1->major }}" type="text"
                                                                    class="form-control" name="major">
                                                                @error('major')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    {{ __('dash.country') }} </label>
                                                                <input value="{{ $admin1->country }}" type="text"
                                                                    class="form-control" placeholder="  " name="country">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    {{ __('dash.youtube_link') }} </label>
                                                                <input value="{{ $admin1->youtube_link }}"
                                                                    type="text" class="form-control" placeholder="  "
                                                                    name="youtube_link">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    {{ __('dash.tags') }} </label>
                                                                <input value="{{ $admin1->tags }}" type="text"
                                                                    class="form-control" placeholder="  " name="tags">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="projectinput1">
                                                                    {{ __('dash.introduction') }} </label>
                                                                <textarea class="form-control" name="introduction">
                                                                {{ $admin1->introduction ?? '' }}
                                                            </textarea>

                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif

                                                <div class="form-actions">

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ __('dash.edit') }}
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- *------------- --}}
                </section>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
@endsection
