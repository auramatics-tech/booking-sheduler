<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AvailableTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AvailableTimeController extends Controller
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
        // $data = AvailableTime::with('student')->orderBy('id', 'DESC')->get();
        $data = [];

        $teacher = User::orderBy('id', 'DESC')
            ->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Teacher');
                }
            )
            ->get();

        if (auth()->user()->hasRole('Teacher')) {
            $data = AvailableTime::where('user_id', Auth()->user()->id)->with('student')->orderBy('id', 'DESC')->get();

            $teacher = User::where('id', Auth()->user()->id)->orderBy('id', 'DESC')
                ->whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Teacher');
                    }
                )
                ->get();
        }

        if ($request->teacher) {
            $data = AvailableTime::where('user_id', $request->teacher)->with('student')->orderBy('id', 'DESC')->get();
        }
        return view('dashboard.AvailableTime.index', compact('data', 'teacher'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::orderBy('id', 'DESC')
            ->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Student');
                }
            )
            ->get();
        $teacher = User::orderBy('id', 'DESC')
            ->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Teacher');
                }
            )
            ->get();
         
        if (auth()->user()->hasRole('Teacher')) {
            $teacher = User::where('id', Auth()->user()->id)->orderBy('id', 'DESC')
                ->whereHas(
                    'roles',
                    function ($q) {
                        $q->where('name', 'Teacher');
                    }
                )
                ->get();
               
        }
        return view('dashboard.AvailableTime.create', compact('students', 'teacher'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'booking' => 'required',
            'start' => 'required',
            'end' => 'required',
            'time' => 'required',
            'user_id' => 'required',
        ]);
        $input = $request->all();

        $t = $input['time'];
        $time_s = '15 minutes';
        if ($t == "15min") {
            $time_s = '15 minutes';
        }
        if ($t == "25min") {
            $time_s = '25 minutes';
        }
        if ($t == "50min") {
            $time_s = '50 minutes';
        }
        $start =  $input['start'];
        $end =  $input['end'];
        $period = new CarbonPeriod(new Carbon($start), $time_s, new Carbon($end));
        $slots = [];
        foreach ($period as $item) {
            array_push($slots, $item->format("Y-m-d h:i A"));
        }
        // dd($slots);
        for ($i = 0; $i < count($slots); $i++) {
            // dd($slots[$i + 1]);
            if ($i != count($slots) - 1) {
                $AvailableTime = AvailableTime::create([
                    'booking' => $input['booking'],
                    'time' => $input['time'],
                    'start' => $slots[$i],
                    'end' =>  $slots[$i + 1],
                    'description' => $input['description'],
                    'user_id' => $request->user_id,
                    'students' => $input['students'] ?? ''
                ]);
            }
        }

        // $AvailableTime = AvailableTime::create([
        //     'booking' => $input['booking'],
        //     'time' => $input['time'],
        //     'start' => $input['start'],
        //     'end' => $input['end'],
        //     'description' => $input['description'],
        //     'user_id' => Auth()->user()->id,
        //     'students' => $input['students'] ?? ''
        // ]);

        session()->flash('Add', __('messages.success'));

        return redirect()->route('available-times.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('dashboard.AvailableTime.show', compact('lesson'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AvailableTime = AvailableTime::find($id);
        $students = User::orderBy('id', 'DESC')
            ->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Student');
                }
            )
            ->get();
        return view('dashboard.AvailableTime.edit', compact('AvailableTime', 'students'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        $input = $request->all();
        $AvailableTime = AvailableTime::find($id);
        $AvailableTime->update([
            'title' => $input['title'],
            'start' => $input['start'],
            'end' => $input['end'],
            'description' => $input['description'],
            'user_id' => Auth()->user()->id,
            'students' => $input['students'] ?? ''
        ]);


        session()->flash('edit', __('messages.Update'));
        return redirect()->route('available-times.index');
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



    public function calendar(Request $request)
    {
        if ($request->ajax()) {
            $data = AvailableTime::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'time', 'start', 'end']);

            if (auth()->user()->hasRole('Teacher')) {
                $data = AvailableTime::where('user_id', Auth()->user()->id)->whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->get(['id', 'time', 'start', 'end']);
            }

            return response()->json($data);
        }
        return view('dashboard.AvailableTime.calendar');
    }

    public function action(Request $request)
    {

        if ($request->ajax()) {

            if ($request->type == 'add') {
                $event = AvailableTime::create([
                    'booking'        =>    0,
                    'start'        =>    $request->start,
                    'end'        =>    $request->end,
                    'time'        =>    '15min',
                    'students' => Auth()->user()->id,
                    'user_id' => Auth()->user()->id,
                ]);
                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = AvailableTime::find($request->id)->update([
                    'booking'        =>    0,
                    'start'        =>    $request->start,
                    'end'        =>    $request->end,
                    'time'        =>    '15min',
                    'students' => Auth()->user()->id,
                    'user_id' => Auth()->user()->id,

                ]);

                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = AvailableTime::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }


    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        AvailableTime::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' =>  __('messages.Delete')]);
    }
}
