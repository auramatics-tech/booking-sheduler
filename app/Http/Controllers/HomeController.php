<?php

namespace App\Http\Controllers;

use App\Notifications\RrquestLesson;
use App\Models\Profile;
use App\Models\User;
use App\RequetClass;
use Illuminate\Http\Request;
use Hash;

class HomeController extends Controller
{
  public function requestClass()
  {

    return view('front.requestClass');
  }
  public function requestClassPost(Request $request)
  {
    $this->validate($request, [

      'phone'            => 'phone:US,KO',
      // 'phone_country'    => 'required_with:phone',

      'name_en' => 'required',
      'name_ko' => 'required',
      'email' => 'required|email|unique:users,email',
      // 'username' => 'required|unique:users,username',
      'age' => 'required',
      'experience_class' => 'required',
      'date_class' => 'required',
      'available_time' => 'required',
    ]);

    // dd($request->all());

    $user = User::create([
      'username' => 'xd' . rand(2, 9),
      'name' => $request->name_en,
      'email' => $request->email,
      'roles_name' => 'Student',
      'password' => Hash::make('xdenglish123'),
    ]);
    $user->assignRole('Student');

    Profile::create([
      'user_id' => $user->id,
      'name_ko' => $request->name_ko,
      'name_en' => $request->name_en,
      'phone' => $request->phone,
      'skype_id' => '',
      'zoom_url' => '',
    ]);
    RequetClass::create([
      'user_id' => $user->id,
      'age' => $request->age,
      'name' => $request->name_ko,
      'experience_class' => $request->experience_class,
      'date_class' => $request->date_class,
      'available_time' => $request->available_time,
      'coupon_code' => $request->coupon_code ?? '',

    ]);
    $user->notify(new RrquestLesson($user->id));
    session()->flash('Add', __('messages.success'));

    return redirect()->route('login');
  }


  public function tutors()
  {
    $data = User::orderBy('id', 'DESC')
      ->whereHas(
        'roles',
        function ($q) {
          $q->where('name', 'Teacher');
        }
      )
      ->where('status', 'active')
      ->with('profile')->get();
    return view('front.tutors', compact('data'));
  }


  public function tutorShow($id)
  {
    $data = User::with('profile')
      ->whereHas(
        'roles',
        function ($q) {
          $q->where('name', 'Teacher');
        }
      )
      ->findOrFail($id);
    return view('front.tutor', compact('data'));
  }


  public function tutorsSearch(Request $request)
  {
    $name = $request->name;
    $data =    $data = User::orderBy('id', 'DESC')
      ->whereHas(
        'roles',
        function ($q) {
          $q->where('name', 'Teacher');
        }
      )
      // ->OrwhereHas(
      //   'profile',
      //   function ($q) use ($name) {
      //     $q->orWhere('name_en', 'like', '%' . $name . '%');
      //     $q->orWhere('name_ko', 'like', '%' . $name . '%');
      //   }
      // )
      ->where('name', 'like', '%' . $request->name . '%')
      ->with('profile')
      ->get();
    // dd($data);
    return view('front.tutors', compact('data'));
  }
}
