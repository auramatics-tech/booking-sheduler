@extends('layouts.master')
@section('title')
Booking Calendar
@stop
@section('css')

<style>
    .modal-backdrop.show {
        opacity: 0.1 !important;
    }

    .daydrop_down .dropdown-menu {
        padding: 1rem;
        min-width: 230px;
    }

    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #b9b9af !important;
        padding: 10px !important;
        background-color: #fff !important;
        border-radius: 2px !important;
        min-height: 40px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding-right: 20px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        top: 1px !important;
        right: 0px !important;
        left: unset !important;
        color: #fff !important;
        opacity: 1 !important;
        border-right: 0px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        background: transparent !important;
    }
    .new_css{
        display: flex !important;
        flex-direction: row !important;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
</style>
<link href="{{ URL::asset('assets/css/booking.css') }}" rel="stylesheet" />
<link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css?v=1675835876" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ __('dash.dash') }}
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Booking Calendar
            </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

<div class="bg-light-gray">
    <div class="">
        <div class="panel materials-panel mt-8">
            <div class="d-flex">
                <ul class="text-lg px-4 tabs">
                    <li><span class="tab-item get_slots" data-value="midnight" aria-selected="true">0:00 - 6:00</span></li>
                    <li><span class="tab-item get_slots" data-value="morning" aria-selected="false">6:00 - 12:00</span></li>
                    <li><span class="tab-item get_slots" data-value="afternoon" aria-selected="false">12:00 - 18:00</span></li>
                    <li><span class="tab-item get_slots" data-value="evening" aria-selected="false">18:00 - 24:00</span></li>
                </ul>
                <ul class="mb-0 d-flex align-items-center pr-4">
                    <li>
                        <div class="dropdown daydrop_down">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                Day
                            </button>
                            <div class="dropdown-menu">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Reschedule</label>
                                        <select name="" id="clone_form" class="w-100">
                                            <option value="">Select Day</option>
                                            @foreach($period as $date)
                                            <option value="{{ date('Y-m-d',strtotime($date))}}">{{ date('l', strtotime($date))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Day Clone To:</label>
                                        <select name="" id="clone_to" class="w-100" multiple>
                                            <option value="">Select Day</option>
                                            @foreach($period as $date)
                                            <option value="{{ date('Y-m-d',strtotime($date))}}">{{ date('l', strtotime($date))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm" id="dayClone">Submit</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown daydrop_down">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle mx-3" data-toggle="dropdown">
                                Week
                            </button>
                            <div class="dropdown-menu">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Day Clone From:</label>
                                        <select name="" id="clone_form1" class="w-100">
                                            <option value="">Select Day</option>
                                            @foreach($period as $date)
                                            <option value="{{ date('Y-m-d',strtotime($date))}}">{{ date('l', strtotime($date))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">To Complete Week</label>
                                        <select name="clone_all[]" id="clone_all" class="w-100 d-none" multiple>
                                            @foreach($period as $date)
                                            <option value="{{ date('Y-m-d',strtotime($date))}}" selected>{{ date('l', strtotime($date))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm" id="weekClone">Submit</button>
                                </form>
                            </div>
                    </li>
                    <li>
                        <div class="dropdown daydrop_down">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                Month
                            </button>
                            <div class="dropdown-menu">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Day Clone From:</label>
                                        <select name="" id="clone_form2" class="w-100">
                                            <option value="">Select Day</option>
                                            @foreach($period as $date)
                                            <option value="{{ date('Y-m-d',strtotime($date))}}">{{ date('l', strtotime($date))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm" id="monthClone">Submit</button>
                                </form>
                            </div>
                    </li>
                </ul>
            </div>
            <div>
                <div class="ant-card ant-card-bordered">
                    <div class="ant-card-body pb-0">
                        <div class="calendar-content time-based">
                            <div>
                                <div class="cal week-scroll">
                                    <div class="cal-container">
                                        <span class="text-success" id="slot_msg"></span>
                                        <table class="timeslot-table slots_main_table" cellpadding="0" id="timeslot-table">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@role('Student')
<!-- Modal teacher detail -->
<div class="modal fade" id="teachers_detail_modal" tabindex="-1" aria-labelledby="dayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_flex">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tutor-card-head-title" id="slot_time"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-center" id="teachers_detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: transparent; color: #475569;
                  border: 1px solid #d9d9d9;">Close</button>
            </div>
        </div>
    </div>
</div>
{--<div class="modal fade" id="reschedule_class_modal" tabindex="-1" aria-labelledby="dayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tutor-card-head-title" id="slot_time"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-center " id="reschedule_booking">
            <table class="timeslot-table reschedule_booking" cellpadding="0" id="timeslot-table">
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: transparent; color: #475569;
                  border: 1px solid #d9d9d9;">Close</button>
            </div>
        </div>
    </div>
</div> --}}
<form id="reschedule_date_form" action="" method="post">
		@csrf <input type="date" name="reschedule_date_form" id="reshedule_date" style="display: none;">
		</form>

@endrole
@role('Teacher')
<div class="modal fade" id="students_detail_modal" tabindex="-1" aria-labelledby="dayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_flex">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tutor-card-head-title" id="slot_time"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-center" id="students_booking_detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: transparent; color: #475569;
                  border: 1px solid #d9d9d9;">Close</button>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection
@section('js')
<script type="text/javascript">
     @role('Teacher')
     var get_slots_url = "{{ route('teacher.get_slots') }}";
     @endrole
     @role('Student')
     var get_slots_url = "{{ route('student.get_slots') }}";
     @endrole
    $(document).ready(function() {
        var defaultSlot = "midnight";
        get_slots(defaultSlot,'slots_main_table')

        $('.get_slots').on('click', function() {
            $(".get_slots").attr("aria-selected", "false");
            $(this).attr("aria-selected", "true");
            var defaultSlot = $(this).attr('data-value');
            get_slots(defaultSlot,'slots_main_table')
        });
    });

    function get_slots(defaultSlot,append_id) {
        $.ajax({
            url: get_slots_url,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: 'slot=' + defaultSlot,
            success: function(data) {
                $("."+append_id).html(data);
            }
        });
    }
    @role('Teacher')
    $(document).on('click', '.b_slots', function() {
        var value = $(this).attr('data-date');
        var value1 = $(this).attr('data-time');
        var time = $('#time').val();
        $(this).addClass('on')
        $(this).addClass('a_slots')
        $(this).removeClass('b_slots')
        $(this).html('A')
        $('#slot_msg').html('');
        if (time)
            $.ajax({
                url: "{{ route('teacher.save_slots') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'start': value,
                    'time': value1
                },
                success: function(data) {
                    if (data.status == 1) {
                        $('#slot_msg').removeClass('text-danger')
                        $('#slot_msg').addClass('text-success')
                    } else {
                        $('#slot_msg').removeClass('text-success')
                        $('#slot_msg').addClass('text-danger')
                    }
                    $('#slot_msg').html(data.msg)
                }
            });
    });
    $(document).on('click', '.a_slots', function() {
        $(this).removeClass('on')
        $(this).removeClass('a_slots')
        $(this).addClass('b_slots')
        $(this).html('')
        var value = $(this).attr('data-date');
        var value1 = $(this).attr('data-time');
        if (time)
            $.ajax({
                url: "{{ route('teacher.cancel_slots') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'start': value,
                    'time': value1
                },
                success: function(data) {
                    if (data.status == 1) {
                        $('#slot_msg').removeClass('text-danger')
                        $('#slot_msg').addClass('text-success')
                    } else {
                        $('#slot_msg').removeClass('text-success')
                        $('#slot_msg').addClass('text-danger')
                    }
                    $('#slot_msg').html(data.msg)
                }
            });
    })

    $(document).on('click', '.requested', function() {
        var slot_id = $(this).attr('data-slot');
        $.ajax({
            url: "{{ route('student.get_students_details') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'slot_id': slot_id
            },
            success: function(data) {
              var students_details = '';
                $.each(data.students_slot, function(k, v) {
                    students_details +='<div class="card border-0 new_css">\n\
                    <div class="mr-4">\n\
                        <figure class="m-0 set_teacher_img">\n\
                            <img src="'+v.student_profile_pic+'" alt="">\n\
                        </figure>\n\
                    </div>\n\
                    <div class="card_detail w-100">\n\
                        <h6>' + v.student_name + '</h6>\n\
                        <a href="javascript:" data-slot="' + v.slot_id + '"  data-student_slot="' + v.id + '" class="btn btn-success w-100 accept_student ">Accept</a>\n\
                        <a href="javascript:" data-slot="' + v.slot_id + '"  data-student_slot="' + v.id + '" class="btn btn-danger w-100 reject_by_teacher" >Reject</a>\n\
                    </div>\n\
                </div>'
            })
                $('#slot_time').html(data.slots_time)
                $('#students_booking_detail').html(students_details);
                $('#students_detail_modal').modal('show')
            }
        });
    })

    $(document).on('click', '.accept_student', function() {
        var student_slot = $(this).attr('data-student_slot');
        var slot_id = $(this).attr('data-slot');
        $.ajax({
            method: "post",
            data:{
                student_slot: student_slot,
                slot_id: slot_id,
                "_token":"{{csrf_token()}}",
            },
            url: '{{route("student.accept_student_slot")}}',
            success: function(data) {
                history.go(0);
            }
        })
	})

    $(document).on('click', '.reject_by_teacher', function() {
        var student_slot = $(this).attr('data-student_slot');
        var slot_id = $(this).attr('data-slot');
        $.ajax({
            method: "post",
            data:{
                student_slot: student_slot,
                slot_id: slot_id,
                "_token":"{{csrf_token()}}",
            },
            url: '{{route("student.reject_student_slot")}}',
            success: function(data) {
                history.go(0);
            }
        })
	})

    $(document).on('click', '.accepted', function() {
        var slot_id = $(this).attr('data-slot');
        $.ajax({
            url: "{{ route('student.get_booked_teacher_detail') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'slot_id': slot_id,
            },
            success: function(data) {
                var students_details = '';
                if(data.booked_student_detail){
;                        students_details += '<div class="card border-0 new_css">\n\
                        <div class="mr-4">\n\
                            <figure class="m-0">\n\
                                <img src="'+data.booked_student_detail.student_profile_pic+'" alt="">\n\
                            </figure>\n\
                        </div>\n\
                        <div class="card_detail w-100">\n\
                            <h6>' + data.booked_student_detail.student_name + '</h6>\n\
                            <span class="btn btn-success w-100">Booked</span>\n\
                        </div>\n\
                    </div>';
                }else{
                    students_details += '<span class="text-danger">Slot not available or booked by someone.</span>';
                }
                $('#slot_time').html(data.slots_time)
                $('#students_booking_detail').html(students_details);
                $('#students_detail_modal').modal('show')
            }
        });
    })
    @endrole
    @role('Student')
    $(document).on('click', '.a_slots', function() {
        var start = $(this).attr('data-date');
        var time = $(this).attr('data-time');
        $.ajax({
            url: "{{ route('student.get_teachers_details') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'start': start,
                'time': time
            },
            success: function(data) {
                var teacher_details = '';
                if(data.slots.length){
                        $.each(data.slots, function(k, v) {
                        teacher_details += '<div class="card border-0">\n\
                        <div class="mr-4">\n\
                            <figure class="m-0">\n\
                                <img src="'+v.teacher_profile_pic+'" alt="">\n\
                            </figure>\n\
                        </div>\n\
                        <div class="card_detail w-100">\n\
                            <h6>' + v.teacher_name + '</h6>\n\
                            <a href="javascript:" data-slot="' + v.id + '" data-teacher_id="' + v.teacher_id + '"  class="btn btn-primary w-100 book_a_class">Book a class</a>\n\
                            <a href="#" class="btn view_profile" >View Profile</a>\n\
                        </div>\n\
                    </div>'
                    })
                }else{
                    teacher_details += '<span class="text-danger">Slot not available or booked by someone.</span>';
                }
               
                $('#slot_time').html(data.slots_time)
                $('#teachers_detail').html(teacher_details);
                $('#teachers_detail_modal').modal('show')
            }
        });
    })
    $(document).on('click', '.book_a_class', function() {
        var slots = $(this).attr('data-slot');
        var teacher_id = $(this).attr('data-teacher_id');
        $.ajax({
            method: "post",
            data:{
                slot_id: slots,
                teacher_id:teacher_id,
                "_token":"{{csrf_token()}}",
            },
            url: '{{route("student.save_student_slots")}}',
            success: function(data) {
                history.go(0);
            }
        })
	})
    // pre code

    $(document).on('click', '.accepted', function() {
        var slot_id = $(this).attr('data-slot');
        $.ajax({
            url: "{{ route('student.get_booked_teacher_detail') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'slot_id': slot_id,
            },
            success: function(data) {
                var teacher_details = '';
                if(data.booked_teacher_detail){
                        teacher_details += '<div class="card border-0">\n\
                        <div class="mr-4">\n\
                            <figure class="m-0">\n\
                                <img src="'+data.booked_teacher_detail.teacher_profile_pic+'" alt="">\n\
                            </figure>\n\
                        </div>\n\
                        <div class="card_detail">\n\
                            <h6>' + data.booked_teacher_detail.teacher_name + '</h6>\n\
                            <a style= "margin-top: 10px;margin-bottom: 10px;" href="javascript:" data-slot="' + data.booked_teacher_detail.id + '" data-teacher_id="' + data.booked_teacher_detail.teacher_id + '"  class="btn btn-primary w-100 reschedule_class teacher_detail">Reschedule</a>\n\
                            <a href="javascript:" data-slot="' + data.booked_teacher_detail.id + '" data-student_id="' + data.booked_teacher_detail.student_id + '"  class="btn btn-danger w-100 cancel_by_student teacher_detail">Cancel Booking</a>\n\
                        </div>\n\
                        <div id="reschedule_sec">\n\
                        </div>\n\
                    </div>';
                }else{
                    teacher_details += '<span class="text-danger">Slot not available or booked by someone.</span>';
                }
                $('#slot_time').html(data.slots_time)
                $('#teachers_detail').html(teacher_details);
                $('#teachers_detail_modal').modal('show')
            }
        });
    })

    $(document).on('click', '.cancel_by_student', function() {
        var slot_id = $(this).attr('data-slot');
        var student_id = $(this).attr('data-student_id');
        $.ajax({
            method: "post",
            data:{
                slot_id: slot_id,
                student_id: student_id,
                "_token":"{{csrf_token()}}",
            },
            url: '{{route("student.cancel_slot_by_student")}}',
            success: function(data) {
                history.go(0);
            }
        })
	})
    
    $(document).on('click', '.reschedule_class', function() {
        var slot_id = $(this).attr('data-slot')
        var date_option =  '<form action="{{route("student.reschedule")}}" method="post"><input type="hidden" name="old_slot_id" value="'+slot_id+'" /><input type="hidden" name="_token" value="{{csrf_token()}}" /><input type="hidden" name="status"  value="5"/><input type="hidden" name="student_id" value="{{Auth::user()->id}}"/><div class="form-group">\n\
                                        <label for="">Day Clone From:</label>\n\
                                        <select name="res_date" id="select_res_date" class="w-100">\n\
                                         <option value="">Select Day</option>';
                                            @foreach($period as $date)
                                            date_option += '<option value="{{ date('Y-m-d',strtotime($date))}}">{{ date('l', strtotime($date))}}</option>'
                                            @endforeach
                            date_option += '</select></div><div class="form-group" id="teacher_sec"></div><div class="form-group" id="time_sec"></div></form>';
            $('.teacher_detail').hide()
            $('#reschedule_sec').html(date_option)

	})

    $(document).on('change', '#select_res_date', function() {
        var date = $(this).val();
         $.ajax({
            method:"post",
            data:{
                date : date,
                "_token":"{{csrf_token()}}",
            },
            url:'{{route("student.get_teachers_reschedule")}}',
            success: function(data) {
                var teachers = '<select class="form-control" id="reschedule_teach_time" name="teacher_id"><option>Select teacher</option>';
                $.each(data.get_teachers, function(k, v) {
                    teachers += '<option value="'+v.teacher_id+'">'+v.teacher_name+'</option>';
                })
                teachers += '</select>';
                $('#teacher_sec').html(teachers);
            }
        })

    })

    $(document).on('change', '#reschedule_teach_time', function() {
        var teacher_id = $(this).val();
        var date = $('#select_res_date').val();
         $.ajax({
            method:"post",
            data:{
                teacher_id : teacher_id,
                date : date,
                "_token":"{{csrf_token()}}",
            },
            url:'{{route("student.get_teachers_reschedule_time")}}',
            success: function(data) {
                var teachers = '<select class="form-control" name="time"><option>Select time</option>';
                $.each(data.get_time, function(k, v) {
                    teachers += '<option value="'+v.time+'">'+v.time+'</option>';
                })
                teachers += '</select><button type="submit" class="btn btn-primary">Reschedule</button>';
                $('#time_sec').html(teachers);
            }
        })

    })
    @endrole
    const first = document.getElementById("clone_form");
    const second = document.getElementById("clone_to");

    first.addEventListener("change", function() {
        const selectedOption = this.value;
        const disabled_option = second.querySelector(`option[disabled]`);
        if (disabled_option) {
            disabled_option.disabled = false;
        }
        const secondOption = second.querySelector(`option[value="${selectedOption}"]`);
        if (selectedOption && secondOption) {
            secondOption.disabled = true;
        }
    });

    $(document).on('click', '#dayClone', function() {
        var clone_form = $("#clone_form").val();
        var clone_to = $("#clone_to").val();
        // var timeArr = [];
        // $("#time:checked").each(function() {
        //         timeArr.push($(this).val());
        //     });
        // if (timeArr.length <= 0) {
        //     $('#slot_msg').removeClass('text-success')
        //     $('#slot_msg').addClass('text-danger')
        //     $('#slot_msg').html('Please check at least one checkbox');
        //     return false;
        // }else{
        get_week_slots(clone_form, clone_to)
        // } 
    });
    $(document).on('click', '#weekClone', function() {
        var clone_form = $("#clone_form1").val();
        var clone_to = $("#clone_all").val();
        get_week_slots(clone_form, clone_to)
    });
    $(document).on('click', '#monthClone', function() {
        var clone_form = $("#clone_form2").val();
        var clone_to = "month";
        get_week_slots(clone_form, clone_to)
    });

    function get_week_slots(clone_form, clone_to) {
        $.ajax({
            url: "{{ url('dashboard/day-clone') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'clone_form': clone_form,
                'clone_to': clone_to
            },
            success: function(data) {
                if (data.status == 1) {
                    $('#slot_msg').removeClass('text-danger')
                    $('#slot_msg').addClass('text-success')
                } else {
                    $('#slot_msg').removeClass('text-success')
                    $('#slot_msg').addClass('text-danger')
                }
                $('#slot_msg').html(data.msg)
                history.go(0);
            }
        });
    }
</script>
<script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js?v=1675835876"></script>
<script>
    $("#clone_to").select2();
</script>
@endsection