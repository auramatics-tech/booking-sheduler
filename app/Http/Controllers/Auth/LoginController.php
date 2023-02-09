<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //   $profile = Profile::where('user_id', Auth::user()->id)->first();

    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        if ($profile == null) {
            return '/dashboard/profile/edit';
        }
        return '/home';
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

      /*  $users = User::where('email', $request->input('login'))->orWhere('username', $request->input('login'))->first();
        if ($users->password == md5($request->password)) {
            // dd("14");
            $md_pass = Hash::make($request->password);
            Auth::login($users);
            return redirect()->intended($this->redirectPath());
        }
*/
        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => __('auth.failed'),
            ]);
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
