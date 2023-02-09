@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    {{ __('dash.edit') }} {{ __('dash.lessons') }}
@stop
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />


    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
@endsection

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ __('dash.lessons') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ __('dash.edit') }} {{ __('dash.lessons') }}
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
                        <a class="btn btn-primary btn-sm" href="{{ route('lessons.index') }}">
                            {{ __('dash.back') }}
                        </a>
                    </div>
                </div><br>

                {!! Form::model($lesson, ['method' => 'PATCH', 'route' => ['lessons.update', $lesson->id]]) !!}
                <div class="">

                    <div class="row mg-b-20">

                        {{-- <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>{{ __('dash.teachers') }}
                                : <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="user_id">
                                <option label="Choose one">
                                </option>
                                @foreach ($teacher as $t)
                                    <option @if ($t->id == $lesson->user_id) selected @endif
                                        value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div> --}}

                       


                    </div>

                </div>

                <div class="row mg-b-20">

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{ __('dash.start') }}: <span class="tx-danger">*</span></label>
                        <input id="datetimepickerstart" class="form-control form-control-sm mg-b-20" name="start"
                            required="" type="text" value="{{ $lesson->start }}">

                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{ __('dash.end') }}: <span class="tx-danger">*</span></label>
                        <input id="datetimepickerend" class="form-control form-control-sm mg-b-20" name="end"
                            value="{{ $lesson->end }}" required="" type="text">
                    </div>

                    <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{ __('dash.students') }}: <span class="tx-danger">*</span></label>

                        <select name="students[]" multiple class="select2 form-control  mg-b-20">
                            <option label="Choose one">
                            </option>
                            @foreach ($students as $v)
                                @php $ss = $lesson->students ?? [] @endphp
                                <option @if (in_array($v->id, $ss)) selected @endif value="{{ $v->id }}">
                                    {{ $v->name }} </option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <hr>

                <div id="repeater" class="repeater">
                    <!-- Repeater Heading -->
                    {{-- <input class="btn btn-main-primary pd-x-20 btn-sm" data-repeater-create type="button" value="Add"/> --}}

                    <button type="button" class="btn btn-main-primary  btn-sm" data-repeater-create type="button" >
                        <i class="fa fa-copy"></i>
                    </button>
                    
               @if( ! $lesson->teacher_avraible)

                 <div class="clearfix"></div>
                <div data-repeater-list="teacher_avraible">
                    <div data-repeater-item  class="row row-sm mg-t-20 items" data-group="test">


                        <div class="item-content  parsley-input col-md-4" id="fnWrapper">
                            <label>{{ __('dash.teachers') }}
                                : <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="teacher_avraible[teacher_id]">
                                <option label="Choose one">
                                </option>
                                @foreach ($teacher as $t)
                                    <option @if ($t->id == Auth()->user()->id) selected @endif
                                        value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="item-content parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.teacher_avraible') }}: <span class="tx-danger">*</span></label>

                            <select name="teacher_avraible[day]"  class="form-control  mg-b-20">
                                <option label="Choose one">
                                </option>

                                <option value="monday" disabled>Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday </option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday" disabled>Sunday</option>
                            </select>
                        </div>

                        <div class="item-content parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.timeLesson') }}: <span class="tx-danger">*</span></label>
                            <input  class="timePickree21 form-control form-control-sm mg-b-20"
                                data-parsley-class-handler="#lnWrapper" name="teacher_avraible[time]"
                                required="" type="text">
                               
                        </div>

                        <div class="col-md-2 m-auto">
                        <button type="button" class="btn btn-danger btn-sm" data-repeater-delete="">X</button>
                        <button type="button" class="btn btn-main-primary  btn-sm" data-repeater-create type="button" >
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>



                    </div>
                </div>
                @endif

                @isset($lesson->teacher_avraible)
                @foreach ($lesson->teacher_avraible as $tt)
                <div class="clearfix"></div>
                <div data-repeater-list="teacher_avraible">
                    <div data-repeater-item  class="row row-sm mg-t-20 items" data-group="test">


                        <div class="item-content  parsley-input col-md-4" id="fnWrapper">
                            <label>{{ __('dash.teachers') }}
                                : <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="teacher_avraible[teacher_id]">
                                <option label="Choose one">
                                </option>
                                @foreach ($teacher as $t)
                                    <option  @if ($tt['teacher_id'] == $t->id ) selected @endif  
                                        value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="item-content parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.teacher_avraible') }}: <span class="tx-danger">*</span></label>

                            <select name="teacher_avraible[day]"  class="form-control  mg-b-20">
                                <option label="Choose one">
                                </option>

                                <option @if ($tt['day'] == "monday" ) selected @endif  value="monday" disabled>Monday</option>
                                <option  @if ($tt['day'] == "tuesday" ) selected @endif value="tuesday">Tuesday</option>
                                <option  @if ($tt['day'] == "wednesday" ) selected @endif value="wednesday">Wednesday</option>
                                <option  @if ($tt['day'] == "thursday" ) selected @endif value="thursday">Thursday</option>
                                <option  @if ($tt['day'] == "friday" ) selected @endif value="friday">Friday </option>
                                <option  @if ($tt['day'] == "saturday" ) selected @endif value="saturday">Saturday</option>
                                <option  @if ($tt['day'] == "sunday" ) selected @endif value="sunday" disabled>Sunday</option>
                            </select>
                        </div>

                        <div class="item-content parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ __('dash.timeLesson') }}: <span class="tx-danger">*</span></label>
                            <input  class="timePickree21 form-control form-control-sm mg-b-20"
                                data-parsley-class-handler="#lnWrapper" name="teacher_avraible[time]"
                                required="" type="text" value="{{ $tt['time'] }}">
                               
                        </div>

                        <div class="col-md-2 m-auto">
                        <button type="button" class="btn btn-danger btn-sm" data-repeater-delete="">X</button>
                        {{-- <button type="button" class="btn btn-main-primary  btn-sm" data-repeater-create type="button" >
                            <i class="fa fa-copy"></i>
                        </button> --}}
                    </div>


                </div>

               
                @endforeach
                @endisset
        </div>
                <div class="row row-sm mg-t-20">

                

                    <div class="col-lg">
                        <label> {{ __('dash.description') }}: </span></label>

                        <textarea class="form-control" placeholder="description" name="description" rows="3">
                            {{ $lesson->description }}
                        </textarea>
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

<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>

<!--Internal  pickerjs js -->
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
  
<script type="text/javascript">
    $(document).ready(function () {
      $('.repeater').repeater({
        show: function () {
          $(this).slideDown();
        },
        hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
              $(this).slideUp(deleteElement);
           }
        },        
      });
    });
  </script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <script>
    $( function() {
      $( "#datetimepickerstart" ).datepicker();
      $( "#datetimepickerend" ).datepicker();

      $('.timePickree21').timepicker({
            autoclose: true , 
            interval: 5,
            // timeFormat: 'hh:mm i'

        });

    } );
    </script>

  <script>
        $(function() {
        //     $('#datetimepickerstart').datetimepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });

        // $('#datetimepickerend').datetimepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });

        // $('.timePickree21').timepicker({
        //     autoclose: true , 
        //     interval: 5,
        //     timeFormat: 'mm'

        // });


            $('.select22').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });
        });
    </script>
@endsection
