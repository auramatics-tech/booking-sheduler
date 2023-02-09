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

class StudentController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:students', ['only' => ['index']]);
        $this->middleware('permission:add students', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit students', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete students', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')
            ->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'Student');
                }
            )
            ->with('profile')->paginate(50);
        return view('dashboard.students.index', compact('data'))
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
        return view('dashboard.students.create', compact('roles'));
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
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['roles_name'] = 'Student';



        $user = User::create($input);

        $user->removeRole('Teacher');
        $user->syncRoles('Student');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->extension();
            $photo = $file->storeAs('photo', $request->name . '.' . $extension);
        }
        $profile = Profile::create([
            'user_id' => $user->id,
            'photo' =>  $photo ?? 'defalut.png',
        ]);

        $user->notify(new User($user->id));
        session()->flash('Add', __('messages.success'));

        return redirect()->route('students.index');
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
        return view('dashboard.students.show', compact('user'));
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
        return view('dashboard.students.edit', compact('user', 'roles', 'userRole'));
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
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input =  Arr::except($input, array('password'));
        }
        // $input['roles_name'] = 'Student';

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
        // $user->assignRole('Student');
        session()->flash('edit', __('messages.Update'));

        return redirect()->route('students.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        User::find($request->user_id)->delete();
        session()->flash('delete', __('messages.Delete'));

        return redirect()->route('students.index');
    }
}
