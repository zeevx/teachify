<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::whereHas('roles', function($role) {
            $role->where('name', '!=', 'superadmin');
        })->get();
        return view('Admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        $my = DB::table('fieldagent_user')
            ->where('agent_id','=', $id)->get('user_id');
        $data = json_decode($my, true); ;
        $fieldagents = User::whereIn('id',$data)
            ->get();
        //
        $my2 = DB::table('school_user')
            ->where('agent_id','=', $id)->get('user_id');
        $data2 = json_decode($my2, true); ;
        $schools = User::whereIn('id',$data2)
            ->get();
        return view('Agent.new', [
            'users' => $users,
            'fieldagents' => $fieldagents,
            'schools' => $schools
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(100, 999)
                    . mt_rand(100, 999)
                    . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
                $password = str_shuffle($pin);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password)
        ]);
        if($request->id == '3'){
            $user->verified = 'false';
        }
        else{
            $user->verified = 'true';
        }
        if($user->save()){
            $data = array('name'=>$request->name,
                'email' => $request->email,
                'pass' => $password
            );

            DB::table('role_user')->insert([
                'role_id' => $request->id,
                'user_id' => $user->id,
            ]);

            if($request->id == '3'){
                DB::table('fieldagent_user')->insert([
                    'user_id' => $user->id,
                    'agent_id' => Auth::user()->id,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'state' => $request->state,
                    'district' => $request->district,
                    'lga' => $request->lga
                ]);
            }
            if($request->id == '5'){
                DB::table('school_user')->insert([
                    'user_id' => $user->id,
                    'agent_id' => Auth::user()->id,
                    'fieldagent_id' => $request->fieldagent_id,
                    'phone' => $request->phone,
                    'bank' => $request->bank,
                    'account_no' => $request->account_no,
                    'state' => $request->state,
                    'district' => $request->district,
                    'lga' => $request->lga,
                    'address' => $request->address
                ]);
            }
            if($request->id == '6'){
                DB::table('teacher_user')->insert([
                    'user_id' => $user->id,
                    'school_id' => $request->school_id,
//                    'agent_id' => $request->agent_id,
                    'agent_id' => Auth::user()->id,
                    'fieldagent_id' => $request->fieldagent_id,
                    'phone' => $request->phone,
                    'state' => $request->state,
                    'district' => $request->district,
                    'lga' => $request->lga,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'bvn' => $request->bvn,
                    'address' => $request->address
                ]);
            }
            $data = array(
                'name' => $user->name
            );
            Mail::send('Mail.register-2', $data, function($message) use ($request) {
                $message->to(env('MAIL_FROM_ADDRESS'), 'New Account Created')->subject
                ('Teachify Account Created');
                $message->from(env('MAIL_FROM_ADDRESS'),'Teachify NG');
            });
            Mail::send('Mail.new', $data, function($message) use ($request) {
                $message->to($request->email, 'New Account Created')->subject
                ('Teachify Account Details');
                $message->from('teachify@test.com','Teachify NG');
            });
            session()->flash('success','User added successfully');
        }
        else{
            session()->flash('failure','An error occured');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
