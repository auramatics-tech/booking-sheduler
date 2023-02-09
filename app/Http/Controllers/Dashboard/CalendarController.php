<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\sections;
use Illuminate\Http\Request;
use App\Models\Section;
use App\StudentLesson;
use auth;

class CalendarController extends Controller
{


    public function calendar1()
    {
        return view('dashboard.calendar.index');
    }

    public function calendar(Request $request)
    {
        if ($request->ajax()) {
            $data = Lesson::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            if (auth()->user()->hasRole('Teacher')) {
                $data = Lesson::where('user_id', Auth()->user()->id)
                    ->whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->get(['id', 'title', 'start', 'end']);
            }

            if (auth()->user()->hasRole('Student')) {
                $s = StudentLesson::where('student_id', Auth()->user()->id)->get('lesson_id')->toArray();
                $data = Lesson::whereIn('id', $s)
                    ->whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->get(['id', 'title', 'start', 'end']);
            }
            // }
            return response()->json($data);
        }
        return view('dashboard.calendar.index');
    }

    public function action(Request $request)
    {
        if (!auth()->user()->hasRole('Student')) {

            if ($request->ajax()) {

                if ($request->type == 'add') {
                    $event = Lesson::create([
                        'title'        =>    $request->title,
                        'start'        =>    $request->start,
                        'end'        =>    $request->end,
                        'user_id' => Auth()->user()->id,
                    ]);
                    return response()->json($event);
                }

                if ($request->type == 'update') {
                    $event = Lesson::find($request->id)->update([
                        'title'        =>    $request->title,
                        'start'        =>    $request->start,
                        'end'        =>    $request->end,
                        'user_id' => Auth()->user()->id,

                    ]);

                    return response()->json($event);
                }

                if ($request->type == 'delete') {
                    $event = Lesson::find($request->id)->delete();

                    return response()->json($event);
                }
            }
        }
    }
}
