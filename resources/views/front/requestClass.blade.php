@extends('layouts.master2')

@section('title')
    {{ __('무료수업 신청서') }}
@stop


@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">

    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-3 col-lg-3 col-xl-3 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <a href="{{ url('/') }}">
                            <img src="{{ URL::asset('xd/logo.png') }}"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-9 col-lg-9 col-xl-9 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mt-5 mb-2 d-flex">
                                        <h2 class="text-primary">
                                            무료수업 신청서
                                        </h2>

                                    </div>
                                    <div class="main-signup-header">
                                        <p class="text-primary">
                                            * 선생님들이 학생에 대한 아무런 정보도 모르기 때문에 최대한 정확히 작성해 주시면 큰 도움이 됩니다.<br />
                                            * 체험수업은 15분씩 총 2회로 구성되어있으며 요청 시 10분씩 2분 더 체험이 가능합니다. [신청방법].<br />
                                            * 무료수업은 각 선생님들의 자체교재 및 온라인 자료로 진행되며, 정규수업 시 학생에 맞는 교재와 기타수업으로 진행됩니다..<br />
                                        </p>


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

                                        <form method="POST" action="{{ route('lesson.requestPost') }}">
                                            @csrf
                                            <div class="row">


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>한국이름 </label> <input class="form-control"
                                                            placeholder="한국이름" value="{{ old('name_ko') }}" name="name_ko"
                                                            type="text">
                                                        @error('name_ko')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>영어이름 </label> <input class="form-control"
                                                            placeholder="Enter your Name" value="{{ old('name_en') }}"
                                                            name="name_en" type="text">
                                                        @error('name_en')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>나이 </label>
                                                        <input value="{{ old('age') }}" class="form-control"
                                                            placeholder="나이" type="text" name="age">
                                                        @error('age')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>상담자 연락처 </label> <input class="form-control"
                                                            placeholder="000000000" type="text" name="phone">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>이메일 주소 </label>
                                                        <input class="form-control" type="email" name="email" />
                                                        <small>해당 이메일로 무료수업 결과가 전송됩니다.

                                                        </small>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> 체험수업(15분 2회) </label>
                                                        <label class="rdiobox">
                                                            <input name="experience_class" value="5분 휴식" type="radio">
                                                            <span>
                                                                5분 휴식</span></label>
                                                        <label class="rdiobox">
                                                            <input name="experience_class" value="10분 휴식" type="radio">
                                                            <span>
                                                                10분 휴식</span></label>

                                                        <small>1차 수업 종료 후 얼마나 쉬었다가 할지 선택해주세요.</small>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>체험수업 희망일</label>
                                                        <input id="datetimepickerDate" class="form-control" type="text"
                                                            name="date_class" />
                                                        <small>
                                                            보통 오전 9시 ~ 다음날 오전 12시(밤) 사이에 수업이 가능합니다. 최소 5시간 이후의 날짜와 시간을
                                                            기입해주세요.

                                                        </small>
                                                        @error('date_class')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>가능한 시간 </label>
                                                        <input class="form-control" type="text" name="available_time"
                                                            placeholder="오후 3시 ~ 오후7시 사이" />

                                                        </small>
                                                        @error('available_time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>쿠폰번호 </label>
                                                        <input class="form-control" type="text" name="coupon_code"
                                                            placeholder="" />

                                                        </small>
                                                        @error('coupon_code')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('dash.send') }}
                                                </button>

                                            </div>
                                        </form>

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

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>

    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>

    <script>
        $(function() {
            $('#datetimepickerDate').datetimepicker({
                format: 'yyyy-mm-dd',
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
        });
    </script>
@endsection
