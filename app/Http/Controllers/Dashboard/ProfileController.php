<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Subscription;
use App\Models\User;

class ProfileController extends Controller
{
    public function  editProfile()
    {
        $admin = User::find(auth()->user()->id);
        // $admin1 = Profile::where('user_id', auth()->user()->id);
        $admin1 =  Profile::where('user_id', auth()->user()->id)->first();
        if ($admin1 === null) {
            $admin1 = Profile::create([
                'user_id' => auth()->user()->id,
                'photo' => 'defalut.png'
            ]);
        }
        // $admin1->photo = 'defalut.png';
        // $admin1->save();

        return view('dashboard.profile.edit', compact('admin', 'admin1'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $admin = User::find(auth()->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            } else {
                unset($request['password']);
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            //            return $request;

            if ($request->type == 2) {
                $admin1 = Profile::find($request->id1);
                $input = $request->all();
                $photo =  'defalut.png';
                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $extension = $file->extension();
                    $photo = $file->storeAs('photo', $admin1->id . '.' . $extension);
                }
                $input['photo'] = $photo ?? 'defalut.png';
                // dd($input['photo']);

                $admin1->update($input);
                session()->flash('Add', __('messages.success'));
            }

            $admin->update($request->all());
            session()->flash('Add', __('messages.success'));



            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }


    public  function profile()
    {
        $subscription = [];
        if (auth()->user()->hasRole('Student')) {
            $student_id = Auth()->user()->id;
            $subscription = Subscription::where('student_id', $student_id)->where('status', 'active')->first();
        }
        return view('dashboard.profile.show', compact('subscription'));
    }
}
