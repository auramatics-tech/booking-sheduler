<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Inovice;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function setting()
    {
        $setting = Setting::find(1);

        return view('dashboard.setting.setting', compact('setting'));
    }


    public function settingPost(Request $request)
    {
        $setting = Setting::find(1);
        $setting->update($request->all());
        session()->flash('edit', __('messages.Update'));
        return redirect('/dashboard/setting');
    }

    public function general()
    {

        return view('dashboard.setting.general');
    }
}
