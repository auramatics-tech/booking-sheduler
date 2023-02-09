<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    // function __construct()
    // {

    //     $this->middleware('permission: users', ['only' => ['index']]);
    //     $this->middleware('permission: add user', ['only' => ['create', 'store']]);
    //     $this->middleware('permission: edit user', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission: delete user', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->with('profile')->get();
        return view('dashboard.users.show_users', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|same:confirm-password',
            'roles_name' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->extension();
            $photo = $file->storeAs('photo', $request->name . '.' . $extension);
        }
        $profile = Profile::create([
            'user_id' => $user->id,
            'photo' =>  $photo ?? 'defalut.png',
        ]);

        $user->notify(new NewUser($user->id));
        session()->flash('Add', __('messages.success'));

        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('dashboard.users.edit', compact('user', 'roles', 'userRole'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles_name' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input =  Arr::except($input, array('password'));
        }
        $user = User::find($id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->extension();
            $photo = $file->storeAs('photo', $user->id . '.' . $extension);
        }
        $profile = Profile::firstOrCreate([
            'user_id' => $user->id
        ], ['user_id' => $user->id]);
        $profile->update([
            'photo' =>  $photo ?? 'defalut.png',
        ]);

        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles_name'));
        session()->flash('edit', __('messages.Update'));

        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        session()->flash('delete', __('messages.Delete'));

        return redirect()->route('users.index');
    }
}
