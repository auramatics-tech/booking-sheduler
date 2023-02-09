@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    {{ __('dash.edit') }} {{ __('dash.teachers') }}
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ __('dash.students') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ __('dash.edit') }} {{ __('dash.students') }}
            </span>
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
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}">
                            {{ __('dash.back') }}
                        </a>
                    </div>
                </div><br>

                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['students.update', $user->id], 'files' => true]) !!}
                <div class="">


                    <div class="row mg-b-20">


                        <div class="col-md-12">
                            <div class="form-group">
                                <img width="70" height="70"
                                    src="{{ url('/') }}/uploads/{{ $user->profile->photo ?? 'defalut.png' }}" />

                                <div class="custom-file">
                                    <label for="projectinput1">
                                        {{ __('dash.photo') }}</label>

                                    <input class="custom-file-input" name="photo" id="customFile" type="file"> <label
                                        class="custom-file-label" for="customFile">Choose
                                        photo</label>
                                </div>
                            </div>
                        </div>


                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> {{ __('dash.name') }}: <span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.email') }}: <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{ __('dash.password') }}: <span class="tx-danger">*</span></label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{ __('dash.confrimPass') }} : <span class="tx-danger">*</span></label>
                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6">
                        <label class="form-label"> {{ __('dash.status') }}</label>
                        <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="{{ $user->status }}">{{ $user->status }}</option>
                            <option value="active">Active</option>
                            <option value="notActie"> Not Active</option>
                        </select>
                    </div>
                </div>


                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">
                        {{ __('dash.edit') }}
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
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
