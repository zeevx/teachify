<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        if (Gate::allows('admin')){
//            return view('Admin.index');
//        }
        $admins = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'admin');
        })->get();
        $fieldAgents = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'fieldagent');
        })->get();
        $agents = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'agent');
        })->get();
        $teachers = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'teacher');
        })->get();
        $schools = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'school');
        })->get();
        $users = User::whereHas('roles', function($role) {
            $role->where('name', '!=', 'superadmin');
        })->get();
        return view('Admin.index', [
            'users' => $users,
            'admin' => $admins,
            'fieldAgents' => $fieldAgents,
            'agents' => $agents,
            'teachers' => $teachers,
            'schools' => $schools
        ]);

    }

    public function profile($id){
        $user = User::find($id);
        $agents = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'agent');
        })->get();
        return view('Admin.profile', [
            'user' => $user,
            'agents' => $agents
        ]);
    }
    public function submit_profile(Request $request){
        $user = User::find($request->id);
        if (empty($request->name) && empty($request->agent)){
            DB::table('role_user')
                ->where('user_id', $user->id)
                ->update(['role_id' => $request->role]);
        }
        elseif (empty($request->role) && empty($request->name)){
            DB::table('fieldagent_user')
                ->where('user_id', $user->id)
                ->update(['agent_id' => $request->agent]);
        }
        else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        session()->flash('success', 'User information updated successfully');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
