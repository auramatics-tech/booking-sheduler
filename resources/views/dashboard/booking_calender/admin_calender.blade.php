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

    .new_css {
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
                        <div class="form-group">
                            <select name="" id="teachers_drop_down" class="w-100">
                                @foreach($get_all_teacher as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
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
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js?v=1675835876"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var defaultSlot = "midnight";
        get_slots(defaultSlot, 'slots_main_table')

        $('.get_slots').on('click', function() {
            $(".get_slots").attr("aria-selected", "false");
            $(this).attr("aria-selected", "true");
            var defaultSlot = $(this).attr('data-value');
            get_slots(defaultSlot, 'slots_main_table')
        });
    });
    $(document).on('change','#teachers_drop_down',function(){
        get_slots("midnight", 'slots_main_table')
    })

    function get_slots(defaultSlot, append_id) {
        $.ajax({
            url: "{{ route('admin_side_get_slots') }}",
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                slot: defaultSlot,
                user_id: $('#teachers_drop_down').val()
            },
            success: function(data) {
                $("." + append_id).html(data);
            }
        });
    }
  
    $(document).on('click', '.a_slots', function() {
        var start = $(this).attr('data-date')
        var time = $(this).attr('data-time')
        var teacher_id = $('#teachers_drop_down').val();
        $.ajax({
            url: "{{ route('admin_all_students_details') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'start': start,
                'time': time
            },
            success: function(data) {
                var students = '<form method="post" action="{{route("admin_student_slot")}}"><div><select  required class="form-control" name="student_id"><option value="">Select Student</option>';
                $.each(data.students, function(k, v) {
                    students += '<option value="'+v.id+'">'+v.name+'</option>';
                })
                students += '</select></div>';
                students += '<input name="_token" type="hidden" value="{{csrf_token()}}" /><input name="start" type="hidden" value="'+start+'" /><input name="time" type="hidden" value="'+time+'"  /><input type="hidden" name="teacher_id" value="'+teacher_id+'"  /><div class="card_detail w-100 mt-3">\n\
                        <button type="submit" class="btn btn-success">Book Slot</button>\n\
                        </div></form>';
                $('#slot_time').html(data.slots_time)
                $('#students_booking_detail').html(students);
                $('#students_detail_modal').modal('show')
            }
        });
    })
    $(document).ready(function(){
        $('#teachers_drop_down').select2();
    })
    @role('Admin')
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
                // console.log(data);
                var students_details = '';
                if(data.booked_student_detail){
                        students_details += '<div class="card border-0 new_css">\n\
                        <div class="mr-4">\n\
                            <figure class="m-0">\n\
                                <img src="'+data.booked_student_detail.student_profile_pic+'" alt="">\n\
                            </figure>\n\
                        </div>\n\
                        <div class="card_detail w-100">\n\
                        <h6>' + data.booked_student_detail.teacher_name + '</h6>\n\
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
</script>

@endsection