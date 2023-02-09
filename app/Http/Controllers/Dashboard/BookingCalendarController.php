<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AvailableTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\User;
use App\Models\TeacherSlot;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use DB;

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
    {   $period = CarbonPeriod::create(Carbon::now(), Carbon::now()->addWeekday(4));
        return view('dashboard.booking_calender.index', compact('period'));
    }

    public function calendar_student(){
        $period = CarbonPeriod::create(Carbon::now(), Carbon::now()->addWeekday(4));
        return view('dashboard.booking_calender.calendar_student', compact('period'));
    }
    public function getSlots(Request $request)
    { 
        if(auth()->user()->hasRole('Teacher')){
            $t_msg = 'A';
            $whereraw = 'status = 1 and teacher_id = '.Auth::user()->id;
            $s = 0;
        }elseif(auth()->user()->hasRole('Student')){
            $t_msg = 'Teachers';
            $whereraw = 'status = 1';
            $s = 1;
        }
        if ($request->ajax()) {
            
            $slot = $request->slot;
            
            if($slot == "midnight"){
                $start_times = "00:00:00";
                $end_times = "05:30:00";
            }elseif($slot == "morning"){
                $start_times ="06:00:00";
                $end_times ="11:30:00";
            }elseif($slot == "afternoon"){
                $start_times ="12:00:00";
                $end_times ="17:30:00";
            }elseif($slot == "evening"){
                $start_times ="18:00:00";
                $end_times ="23:30:00"; 
            }
            $time_s = '30 minutes';
            $period_time= new CarbonPeriod($start_times, $time_s, $end_times);
            $slots = [];
            foreach ($period_time as $item) {
                array_push($slots, $item->format("H:i:s"));
            }
            $period_date = CarbonPeriod::create(Carbon::now(), Carbon::now()->endOfWeek());
            $slotsdate = [];
            $table_start = '<tr class="cal-week-timed"><td class="cal-timezone side text-center">GMT+9</td> ';
            foreach ($period_date as $key => $date) {
                $table_start .= '<td class="today text-center">'.date('D n/j', strtotime($date)).'</td>';
            }
            $table_start .= "</tr>";
            $table = '';
            foreach($slots as $s_key =>$slot){
                $table .= "<tr>";
                $table .= '<td class="side text-center"><input type="checkbox" name="time[]" value="'.$slot.'" id="time" class="mr-3 d-none">'.date('h:i A',strtotime($slot)).'</td>';
                foreach ($period_date as $date) {
                    $data = TeacherSlot::where( ['start'=> date('Y-m-d',strtotime($date)), 'time'=> $slot])->whereRaw($whereraw)->count();
                    if($data > 0){
                        $table .= "<td class='upper border-right on a_slots text-center' data-date='".date('Y-m-d',strtotime($date))."' data-time='".$slot."'>".(( $data > 0 && $s == 1) ?  $data.' '  : '').$t_msg."</td>";
                    }else{
                        $table .= "<td class='upper border-right b_slots text-center' data-date='".date('Y-m-d',strtotime($date))."' data-time='".$slot."'></td>";
                    }
                    
                }
                $table .= "</tr>";
            }
            $all_table = $table_start . $table;
            return response()->json($all_table);
        }
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
        $booking_slot = TeacherSlot::whereDate('start',$request->start)->where(['time'=>$request->time,'teacher_id'=>Auth::user()->id,'status'=>1])->first();
        if(empty($booking_slot)){
            $booking_slot = new TeacherSlot;
            $booking_slot->start = $request->start;
            $booking_slot->time = $request->time;
            $booking_slot->teacher_id = Auth::user()->id;
            $booking_slot->status = 1;
            $booking_slot->save();
            $status = 1;
            $msg = __('messages.success');
        }else{
            $msg = __('messages.slot already exist.');
            $status = 0;
        }

        return response(['msg'=>$msg,'status'=>$status]);
    }
    public function slotClone(Request $request)
    {  
        $days =[];
        if(isset($request->clone_to) && $request->clone_to != "month"){
            $days =$request->clone_to;
        }
      
        if($request->clone_to == "month"){
            $get_date = $request->clone_form;
            $day = Carbon::parse($get_date)->format('l');
            $period =CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
            foreach ($period as $date) {
                $get_day = Carbon::parse($date)->format('l');
                if($day == $get_day && $date > $get_date) {
                    $days[] = $date->format('Y-m-d');
                }
            }
        }
        $slots =TeacherSlot::whereDate('start',$request->clone_form)->where('teacher_id',Auth::user()->id)->where('status',1)->get();

        foreach ($days as $date) {
            foreach ($slots as $slot) {
                $pre_slot =TeacherSlot::where(['start'=>$date,'time'=>$slot->time,'status'=>1])->where('teacher_id',Auth::user()->id)->first();;
                if(empty($pre_slot)){
                    $new_slot = new TeacherSlot();
                    $new_slot->start = $date;
                    $new_slot->time = $slot->time;
                    $new_slot->teacher_id = Auth::user()->id;
                    $new_slot->save();
                }
            }
        }  session()->flash('Add', __('messages.success'));
            $msg = __('messages.success');
            $status = 1;
        return response(['msg'=>$msg,'status'=>$status]);
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
    public function cancel_slots(Request $request){
        $booking_slot = TeacherSlot::whereDate('start',$request->start)->where(['time'=>$request->time,'teacher_id'=>Auth::user()->id,'status'=>1])->first();
        $booking_slot->status = 0;
        $booking_slot->save();
        return response(['status'=>1,'msg'=>'Slot removed successfully.']);
    }
    public function get_teachers_details(Request $request){
        $slots = TeacherSlot::
                select('teacher_slots.*',DB::raw("(select users.name from `users` where `users`.`id` = teacher_slots.teacher_id) as teacher_name"))
                ->whereDate('start',$request->start)->where(['time'=>$request->time,'status'=>1])->get();
                $slots_time = date('M d ,Y',strtotime($request->start)).' '.date('h:i A',strtotime($request->time));
                return response(['slots'=>$slots,'slots_time'=>$slots_time]);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        AvailableTime::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' =>  __('messages.Delete')]);
    }
}
