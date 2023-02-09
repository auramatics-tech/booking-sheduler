@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />


    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
@endsection

@section('title')
    {{ __('dash.add') }} {{ __('dash.subscriptions') }}

@stop


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dash.subscriptions') }}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('dash.add') }}

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
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('subscriptions.index') }}">{{ __('dash.back') }}</a>
                        </div>
                    </div><br>
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                        action="{{ route('subscriptions.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="">

                            <div class="row mg-b-20">


                                <div class="parsley-input col-md-3" id="fnWrapper">
                                    <label>{{ __('dash.UID') }}
                                        : <span class="tx-danger">*</span></label>
                                    <input readonly value="XD-Englisg00{{ rand(2, 50) }}"
                                        class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                        name="UID" required="" type="text">
                                </div>
                                <div class="parsley-input col-md-3" id="fnWrapper">
                                    <label>{{ __('dash.name') }}
                                        : <span class="tx-danger">*</span></label>
                                    <input placeholder="주 x회 x분 (x주)" class="form-control form-control-sm mg-b-20"
                                        data-parsley-class-handler="#lnWrapper" name="name" required=""
                                        type="text">
                                </div>


                                <div class="parsley-input col-md-3" id="fnWrapper">
                                    <label>{{ __('dash.type') }}
                                        : <span class="tx-danger">*</span></label>
                                    <input placeholder="xx분 수강료" class="form-control form-control-sm mg-b-20"
                                        data-parsley-class-handler="#lnWrapper" name="type" required=""
                                        type="text">
                                </div>
                                <div class="parsley-input col-md-3" id="fnWrapper">
                                    <label>{{ __('dash.price') }}
                                        : <span class="tx-danger">*</span></label>
                                    <input placeholder="000" class="form-control form-control-sm mg-b-20"
                                        data-parsley-class-handler="#lnWrapper" name="price" required=""
                                        type="text">
                                </div>

                            </div>

                        </div>

                        <div class="row mg-b-20">


                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ __('dash.start') }}: <span class="tx-danger">*</span></label>
                                <input onchange="ChangeDate($(this).val());" id="datetimepickerstart"
                                    class="start form-control form-control-sm mg-b-20" name="start" required=""
                                    type="text">

                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ __('dash.end') }}: <span class="tx-danger">*</span></label>
                                <input id="datetimepickerend" class="end form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="end" required="" type="text">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ __('dash.students') }}: <span class="tx-danger">*</span></label>

                                <select name="student_id" class="select2 form-control  mg-b-20">
                                    <option label="Choose one">
                                    </option>
                                    @foreach ($students as $v)
                                        <option value="{{ $v->id }}"> {{ $v->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label"> {{ __('dash.status') }}</label>
                                <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                    <option value="active">Active</option>
                                    <option value="waiting">Waiting</option>
                                    <option value="processing">Processing</option>
                                    <option value="unacceptable">UNAcceptable</option>
                                    <option value="reference">Reference</option>
                                    <option value="notActive"> Not Active</option>
                                </select>
                            </div>

                            <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ __('dash.lessonDays') }}: <span class="tx-danger">*</span></label>

                                <select name="day_lesson[]" multiple class="select2 form-control  mg-b-20">
                                    <option label="Choose one">
                                    </option>
                                    <option value="monday">월요일</option>
                                    <option value="tuesday">화요일</option>
                                    <option value="wednesday">수요일</option>
                                    <option value="thursday">목요일</option>
                                    <option value="friday">금요일 </option>
                                    <option value="saturday">토요일</option>
                                    <option value="sunday">일요일</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">
                                {{ __('dash.confirm') }}</button>
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


    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>

    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>

    <script>
        $(function() {
            $('#datetimepickerstart').datetimepicker({
                format: 'yyyy-mm-dd hh:ii',
                autoclose: true
            });

            $('#datetimepickerend').datetimepicker({
                format: 'yyyy-mm-dd hh:ii',
                autoclose: true
            });

            $('.select22').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });

            $('.selectDays').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });


        });

        function ChangeDate(value) {
            // alert(value);
            var newDate = moment(value, "YYYY-MM-DD").add(1, 'months').format('YYYY-MM-DD h:m');
            $('.end').val(newDate);

        }
    </script>
@endsection
