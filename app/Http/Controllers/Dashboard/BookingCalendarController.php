<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AvailableTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\User;
use App\Models\TeacherSlot;
use App\Models\StudentBookingSlot;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use DB;
use Mail;

class BookingCalendarController extends Controller
{

    function __construct()
    {

        // $this->middleware('permission:teachers', ['only' => ['index']]);
        // $this->middleware('permission:add teachers', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit teachers', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete teachers', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $period = CarbonPeriod::create(Carbon::now(), Carbon::now()->addWeekday(4));
        return view('dashboard.booking_calender.index', compact('period'));
    }

    public function calendar_student()
    {
        $period = CarbonPeriod::create(Carbon::now(), Carbon::now()->addWeekday(4));
        return view('dashboard.booking_calender.calendar_student', compact('period'));
    }
    public function teachers_side_getSlots(Request $request)
    {

            $slot = $request->slot;

            if ($slot == "midnight") {
                $start_times = "00:00:00";
                $end_times = "05:30:00";
            } elseif ($slot == "morning") {
                $start_times = "06:00:00";
                $end_times = "11:30:00";
            } elseif ($slot == "afternoon") {
                $start_times = "12:00:00";
                $end_times = "17:30:00";
            } elseif ($slot == "evening") {
                $start_times = "18:00:00";
                $end_times = "23:30:00";
            }
            $time_s = '30 minutes';
            $period_time = new CarbonPeriod($start_times, $time_s, $end_times);
            $slots = [];
            foreach ($period_time as $item) {
                array_push($slots, $item->format("H:i:s"));
            }
            $period_date = CarbonPeriod::create(Carbon::now(), Carbon::now()->endOfWeek());
            $slotsdate = [];
            $table_start = '<tr class="cal-week-timed"><td class="cal-timezone side text-center">GMT+9</td> ';
            foreach ($period_date as $key => $date) {
                $table_start .= '<td class="today text-center">' . date('D n/j', strtotime($date)) . '</td>';
            }
            $table_start .= "</tr>";
            $table = '';
            foreach ($slots as $s_key => $slot) {
                $table .= "<tr>";
                $table .= '<td class="side text-center"><input type="checkbox" name="time[]" value="' . $slot . '" id="time" class="mr-3 d-none">' . date('h:i A', strtotime($slot)) . '</td>';
                foreach ($period_date as $date) {
                    $data = TeacherSlot::where(['start' => date('Y-m-d', strtotime($date)), 'time' => $slot, 'teacher_id' => Auth::user()->id])->whereIn('status', [1, 2])->pluck('id')->toarray();
                    if (count($data) > 0) {
                        $check_booking_status = $this->check_my_slot_in_student_booking($data);
                        if($check_booking_status['status'] == 1){
                            $table .= "<td class='upper border-right ".$check_booking_status['class']." on bg-".$check_booking_status['color']." text-center' data-slot='".$check_booking_status['id']."'>".$check_booking_status['msg']."</td>";
                        }else{
                            $table .= "<td class='upper border-right on a_slots text-center' data-date='" . date('Y-m-d', strtotime($date)) . "' data-time='" . $slot . "'>A</td>";
                        }
                    } else {
                        $table .= "<td class='upper border-right b_slots text-center' data-date='" . date('Y-m-d', strtotime($date)) . "' data-time='" . $slot . "'></td>";
                    }
                }
            }
            $table .= "</tr>";
            $all_table = $table_start . $table;
        return response()->json($all_table);
    }
    public function student_side_getSlots(Request $request)
    {
        if ($request->ajax()) {

            $slot = $request->slot;

            if ($slot == "midnight") {
                $start_times = "00:00:00";
                $end_times = "05:30:00";
            } elseif ($slot == "morning") {
                $start_times = "06:00:00";
                $end_times = "11:30:00";
            } elseif ($slot == "afternoon") {
                $start_times = "12:00:00";
                $end_times = "17:30:00";
            } elseif ($slot == "evening") {
                $start_times = "18:00:00";
                $end_times = "23:30:00";
            }
            $time_s = '30 minutes';
            $period_time = new CarbonPeriod($start_times, $time_s, $end_times);
            $slots = [];
            foreach ($period_time as $item) {
                array_push($slots, $item->format("H:i:s"));
            }
            $period_date = CarbonPeriod::create(Carbon::now(), Carbon::now()->endOfWeek());
            $slotsdate = [];
            $table_start = '<tr class="cal-week-timed"><td class="cal-timezone side text-center">GMT+9</td> ';
            foreach ($period_date as $key => $date) {
                $table_start .= '<td class="today text-center">' . date('D n/j', strtotime($date)) . '</td>';
            }
            $table_start .= "</tr>";
            $table = '';
            foreach ($slots as $s_key => $slot) {
                $table .= "<tr>";
                $table .= '<td class="side text-center"><input type="checkbox" name="time[]" value="' . $slot . '" id="time" class="mr-3 d-none">' . date('h:i A', strtotime($slot)) . '</td>';
                foreach ($period_date as $date) {
                    $data = TeacherSlot::where(['start' => date('Y-m-d', strtotime($date)), 'time' => $slot])->whereIn('status',[1,2])->pluck('id')->toarray();
                    if (count($data) > 0) {
                        $student_booking_slot = $this->check_student_slot_status($data);
                        if ($student_booking_slot['status'] == 1) {
                            $table .= "<td class='upper border-right bg-".$student_booking_slot['color']." ".$student_booking_slot['class']." text-center' data-slot='" . $student_booking_slot['id'] . "'>".$student_booking_slot['msg']."</td>";
                        } else {
                            $table .= "<td class='upper border-right on a_slots text-center' data-date='" . date('Y-m-d', strtotime($date)) . "' data-time='" . $slot . "'>" .count( $data) . "Teachers</td>";
                        }
                    } else {
                        $table .= "<td class='upper border-right b_slots text-center' data-date='" . date('Y-m-d', strtotime($date)) . "' data-time='" . $slot . "'></td>";
                    }
                }
                $table .= "</tr>";
            }
            $all_table = $table_start . $table;
            return response()->json($all_table);
        }
    }
    public function check_my_slot_in_student_booking($data){
        $student_booking_slot = StudentBookingSlot::
        where(['teacher_id' => Auth::user()->id])
        ->whereIn('slot_id', $data)->whereIn('status' ,[1,3])
        ->orderby('id', 'desc')
        ->get();
        // echo "<pre>";print_r($student_booking_slot);
        if(count($student_booking_slot)){
            if ($student_booking_slot->contains('status', 1)){
                $status = 'Booked';
                $class = 'accepted';
                $color = 'success';
            }else{
                $status = $student_booking_slot->count().' Requested';
                $class='requested';
                $color = 'warning';
            }
            $data_result = ['status'=>1,'msg'=>$status,'id'=>$data[0],'class'=>$class,'color'=>$color];
        }else{
            $data_result = ['status'=>0,'msg'=>''];
        }
        return $data_result;
    }
    public function check_student_slot_status($data){
        $student_booking_slot = StudentBookingSlot::
        where(['student_id' => Auth::user()->id])
        ->whereIn('slot_id', $data)
        ->orderby('id', 'desc')
        ->first();
        if(!empty($student_booking_slot)){
            if($student_booking_slot->status == 1){
                $msg = 'Booked';
                $color = 'success';
                $class = 'accepted';
            }elseif($student_booking_slot->status == 2){
                $msg = 'Rejected';
                $color = 'danger';
                $class = 'rejected';
            }elseif($student_booking_slot->status == 3){
                $msg = 'Requested';
                $color = 'warning';
                $class = 'requested';
            }elseif($student_booking_slot->status == 4){
                $msg = 'Canceled';
                $color = 'danger';
                $class = 'canceled';
            }elseif($student_booking_slot->status == 5){
                $msg = 'Rescheduled';
                $color = 'primary';
                $class = 'rescheduled';
            }
            $data = ['id'=>$student_booking_slot->id,'status'=>1,'msg'=>$msg,'color'=>$color,'class'=>$class];
        }else{
            $data = ['id'=>'','status'=>0,'msg'=>'','color'=>''];
        }
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"<pre>";print_r($request->all());die;
        $this->validate($request, [
            'start' => 'required',
        ]);
        $booking_slot = TeacherSlot::whereDate('start', $request->start)->where(['time' => $request->time, 'teacher_id' => Auth::user()->id])->whereIn('status', [1, 2])->first();
        if (empty($booking_slot)) {
            $booking_slot = new TeacherSlot;
            $booking_slot->start = $request->start;
            $booking_slot->time = $request->time;
            $booking_slot->teacher_id = Auth::user()->id;
            $booking_slot->status = 1;
            $booking_slot->save();
            $status = 1;
            $msg = __('messages.success');
        } else {
            $msg = __('messages.slot already exist.');
            $status = 0;
        }

        return response(['msg' => $msg, 'status' => $status]);
    }
    public function slotClone(Request $request)
    {
        $days = [];
        if (isset($request->clone_to) && $request->clone_to != "month") {
            $days = $request->clone_to;
        }

        if ($request->clone_to == "month") {
            $get_date = $request->clone_form;
            $day = Carbon::parse($get_date)->format('l');
            $period = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
            foreach ($period as $date) {
                $get_day = Carbon::parse($date)->format('l');
                if ($day == $get_day && $date > $get_date) {
                    $days[] = $date->format('Y-m-d');
                }
            }
        }
        $slots = TeacherSlot::whereDate('start', $request->clone_form)->where('teacher_id', Auth::user()->id)->whereIn('status', [1, 2])->get();

        foreach ($days as $date) {
            foreach ($slots as $slot) {
                $pre_slot = TeacherSlot::where(['start' => $date, 'time' => $slot->time, 'status' => 1])->where('teacher_id', Auth::user()->id)->first();;
                if (empty($pre_slot)) {
                    $new_slot = new TeacherSlot();
                    $new_slot->start = $date;
                    $new_slot->time = $slot->time;
                    $new_slot->teacher_id = Auth::user()->id;
                    $new_slot->status = 1;
                    $new_slot->save();
                }
            }
        }
        session()->flash('Add', __('messages.success'));
        $msg = __('messages.success');
        $status = 1;
        return response(['msg' => $msg, 'status' => $status]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        AvailableTime::find($request->id)->delete();
        session()->flash('delete', __('messages.Delete'));

        return redirect()->route('available-times.index');
    }
    public function cancel_slots(Request $request)
    {
        $booking_slot = TeacherSlot::whereDate('start', $request->start)->where(['time' => $request->time, 'teacher_id' => Auth::user()->id, 'status' => 1])->first();
        $booking_slot->status = 0;
        $booking_slot->save();
        return response(['status' => 1, 'msg' => 'Slot removed successfully.']);
    }
    public function get_teachers_details(Request $request)
    {
        $asset = asset('uploads/');
        $slots = TeacherSlot::select(
                'teacher_slots.*',
                DB::raw("(select users.name from `users` where `users`.`id` = teacher_slots.teacher_id) as teacher_name"),
                DB::raw("(select concat('" . $asset . "','/',COALESCE(profiles.photo,'defalut.png')) from `profiles` where `profiles`.`user_id` = teacher_slots.teacher_id) as teacher_profile_pic")
            )
            ->whereDate('start', $request->start)->where(['time' => $request->time, 'status' => 1])->get();
        // echo"<pre>";print_r($slots);die;
        $slots_time = date('M d ,Y', strtotime($request->start)) . ' ' . date('h:i A', strtotime($request->time));
        return response(['slots' => $slots, 'slots_time' => $slots_time]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        AvailableTime::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' =>  __('messages.Delete')]);
    }

    public function save_student_slots(Request $request)
    {

        $this->validate($request, [
            'slot_id' => 'required',
            'teacher_id' => 'required',
        ]);
        $student_booking_slot = StudentBookingSlot::where('slot_id', $request->slot_id)->where(['student_id' => Auth::user()->id, 'status' => 1, 'teacher_id' => $request->teacher_id])->first();
        if (empty($student_booking_slot)) {
            $student_booking_slot = new StudentBookingSlot;
            $student_booking_slot->slot_id = $request->slot_id;
            $student_booking_slot->teacher_id = $request->teacher_id;
            $student_booking_slot->student_id = Auth::user()->id;
            $student_booking_slot->save();
            $status = 1;
            // $update_teacher_slot = TeacherSlot::where('id', $request->slot_id)->update(['status' => 2]);
            $msg = __('messages.success');
            session()->flash('Add', __('messages.success'));
        } else {
            $msg = __('messages.slot already exist.');
            session()->flash('Add', __('messages.slot already exist'));
            $status = 0;
        }
        return response(['msg' => $msg, 'status' => $status]);
    }
    public function get_students_details(Request $request)
    {
        $asset = asset('uploads/');
        $students_slot = StudentBookingSlot::select(
                'student_booking_slots.*',
                DB::raw("(select users.name from `users` where `users`.`id` = student_booking_slots.student_id) as student_name"),
                DB::raw("(select users.name from `users` where `users`.`id` = student_booking_slots.teacher_id) as teacher_name"),
                DB::raw("(select teacher_slots.start from `teacher_slots` where `teacher_slots`.`teacher_id` = student_booking_slots.teacher_id and `teacher_slots`.`id` = student_booking_slots.slot_id) as teacher_slots_date"),
                DB::raw("(select teacher_slots.time from `teacher_slots` where `teacher_slots`.`teacher_id` = student_booking_slots.teacher_id and `teacher_slots`.`id` = student_booking_slots.slot_id) as teacher_slots_time"),
                DB::raw("(select concat('" . $asset . "','/',COALESCE(profiles.photo,'defalut.png')) from `profiles` where `profiles`.`user_id` = student_booking_slots.student_id) as student_profile_pic")
            )
            ->where('slot_id', $request->slot_id)->whereIn('status',[1,3])->get();
            $slots_time = date('M d ,Y', strtotime($students_slot[0]->teacher_slots_date)) . ' ' . date('h:i A', strtotime($students_slot[0]->teacher_slots_time));
        return response(['students_slot' => $students_slot ,  'slots_time' => $slots_time]);
    }

    public function accept_student_slot(Request $request){
        $update_teacher_slot = TeacherSlot::where('id', $request->slot_id)->update(['status' => 2]);
        $students_slot = StudentBookingSlot::where('slot_id', $request->slot_id)->update(['status' =>2]);
        $students_slot_approved = StudentBookingSlot::where('id', $request->student_slot)->update(['status' => 1]);
        $msg = __('messages.success');
        session()->flash('Add', __('messages.success'));
        return response(['msg' => $msg, ]);
    }

    public function reject_student_slot(Request $request){
        $students_slot_approved = StudentBookingSlot::where('id', $request->student_slot)->update(['status' => 2]);
        $msg = __('messages.success');
        session()->flash('Add', __('messages.success'));
        return response(['msg' => $msg,]);

    }


    public function get_booked_teacher_detail(Request $request ){
       if(auth()->user()->hasRole('Student')) {
        $asset = asset('uploads/');
        $booked_teacher_detail = StudentBookingSlot::select(
                'student_booking_slots.*',
                DB::raw("(select users.name from `users` where `users`.`id` = student_booking_slots.teacher_id) as teacher_name"),
                DB::raw("(select concat('" . $asset . "','/',COALESCE(profiles.photo,'defalut.png')) from `profiles` where `profiles`.`user_id` = student_booking_slots.teacher_id) as teacher_profile_pic"),
                DB::raw("(select teacher_slots.start from `teacher_slots` where `teacher_slots`.`teacher_id` = student_booking_slots.teacher_id and `teacher_slots`.`id` = student_booking_slots.slot_id) as teacher_slots_date"),
                DB::raw("(select teacher_slots.time from `teacher_slots` where `teacher_slots`.`teacher_id` = student_booking_slots.teacher_id and `teacher_slots`.`id` = student_booking_slots.slot_id) as teacher_slots_time")
            )
            ->where('id', $request->slot_id)->first();
            $slots_time = date('M d ,Y', strtotime($booked_teacher_detail->teacher_slots_date)) . ' ' . date('h:i A', strtotime($booked_teacher_detail->teacher_slots_time));
           return response(['booked_teacher_detail' => $booked_teacher_detail, 'slots_time' => $slots_time]);
        }
            $asset = asset('uploads/');
             $booked_student_detail = StudentBookingSlot::select(
                    'student_booking_slots.*',
                    DB::raw("(select users.name from `users` where `users`.`id` = student_booking_slots.student_id) as student_name"),
                    DB::raw("(select teacher_slots.start from `teacher_slots` where `teacher_slots`.`teacher_id` = student_booking_slots.teacher_id and `teacher_slots`.`id` = student_booking_slots.slot_id) as teacher_slots_date"),
                    DB::raw("(select teacher_slots.time from `teacher_slots` where `teacher_slots`.`teacher_id` = student_booking_slots.teacher_id and `teacher_slots`.`id` = student_booking_slots.slot_id) as teacher_slots_time"),
                    DB::raw("(select concat('" . $asset . "','/',COALESCE(profiles.photo,'defalut.png')) from `profiles` where `profiles`.`user_id` = student_booking_slots.student_id) as student_profile_pic")
                )
                ->where('slot_id', $request->slot_id)->where('status',1)->first();
                // echo "<pre>";print_r($booked_student_detail);die;
                $slots_time = date('M d ,Y', strtotime($booked_student_detail->teacher_slots_date)) . ' ' . date('h:i A', strtotime($booked_student_detail->teacher_slots_time));
            return response(['booked_student_detail' => $booked_student_detail, 'slots_time' => $slots_time]);

    }

    public function cancel_slot_by_student(Request $request){
        // echo"<pre>";print_r($request->all());die;
        $cancel_by_student = StudentBookingSlot::where('id', $request->slot_id)->where('student_id', $request->student_id)->first();
        $cancel_by_student->status = 4 ;
        $cancel_by_student->save();
        $update_teacher_slots = TeacherSlot::where(['id'=>$cancel_by_student->slot_id,'teacher_id'=>$cancel_by_student->teacher_id])->update(['status' => 1]);
        $msg = __('messages.success');
        session()->flash('Add', __('messages.success'));
        return response(['msg' => $msg,]);

    }
    
}
