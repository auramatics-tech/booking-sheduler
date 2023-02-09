<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notification as NotificationModel;
use App\Notifications\AddNewNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function index()
    {
        $notifications =  NotificationModel::get();
        $users = User::get();

        if (!auth()->user()->hasRole('Admin')) {
            $notifications =  NotificationModel::where('data', auth()->user()->id)->get();
            // $notifications =  auth()->user()->notifications();
        }
        return view('dashboard.notifications.index', compact('notifications', 'users'));
    }

    public function sendNotification(Request $request)
    {
        $users = User::get();
        foreach ($users as $user) {

            $user->notify(new AddNewNotification($request->title, $request->body, $user->id));
        }
    }

    public function store(Request $request)
    {
        try {
            // dd($request->user_id);
            if ($request->user_id == "0") {
                $users = User::select('id')->get();
                $this->sendNotification($request);
                return redirect()->back();
            }

            $user = User::find($request->user_id);
            $user->notify(new AddNewNotification($request->title, $request->body, $user->id));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {

            $n = NotificationModel::where('notifiable_id', $id)->first();
            $n->delete();
            session()->flash('delete', __('messages.Delete'));
            return redirect()->route('notifications.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
