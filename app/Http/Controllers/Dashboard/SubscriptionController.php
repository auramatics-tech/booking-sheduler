<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaidLog;
use App\Models\Poinit;
use App\Models\Subscription;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class SubscriptionController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:subscriptions', ['only' => ['index']]);
        $this->middleware('permission:add subscriptions', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit subscriptions', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete subscriptions', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Subscription::orderBy('id', 'DESC')->get();
        $subscription = [];
        if (auth()->user()->hasRole('Student')) {
            $student_id = Auth()->user()->id;
            $subscription = Subscription::where('student_id', $student_id)->where('status', 'active')->first();
        }
        return view('dashboard.subscriptions.index', compact('data', 'subscription'));
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
        return view('dashboard.subscriptions.create', compact('students'));
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
            'start' => 'required',
            'end' => 'required',
            'student_id' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth()->user()->id;
        $subscription = Subscription::create($input);
        $log = PaidLog::create([
            'status' => 'paid',
            'date' => now(),
            'user_id' => $request->student_id,
            'price' => $request->price,
        ]);
        session()->flash('Add', __('messages.success'));

        return redirect()->route('subscriptions.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = Subscription::find($id);
        return view('dashboard.subscriptions.show', compact('subscription'));
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
        return view('dashboard.subscriptions.edit', compact('user', 'roles', 'userRole'));
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
            $input = array_except($input, array('password'));
        }
        $input['roles_name'] = 'Student';

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole('Student');
        session()->flash('edit', __('messages.Update'));

        return redirect()->route('subscriptions.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscription::find($id)->delete();
        session()->flash('delete', __('messages.Delete'));

        return redirect()->route('subscriptions.index');
    }


    public function paidLog()
    {

        $data = PaidLog::get();
        $transactions = Poinit::get();
        if (auth()->user()->hasRole('Student')) {
            $data = PaidLog::where('user_id', Auth()->user()->id)->get();
            $transactions = Poinit::where('pointable_id', Auth()->user()->id)->get();
        }
        return view('dashboard.subscriptions.paidLog', compact('data', 'transactions'));
    }
}
