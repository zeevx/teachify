<?php

namespace App\Http\Controllers\FieldAgent;

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

        $teachers = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'teacher');
        })->get();
        $schools = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'school');
        })->get();
        $users = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'teacher');
        })->get();
        return view('FieldAgent.index', [
            'users' => $users,
            'teachers' => $teachers,
            'schools' => $schools
        ]);

    }

    public function submit_profile_info(Request $request){
        $user = User::find($request->id);
        $fieldagent = DB::table('fieldagent_user')
            ->where('user_id','=', $user->id)->first();
        if(!empty($fieldagent)){
            DB::table('fieldagent_user')
                ->where('user_id', $user->id)
                ->update([
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'state' => $request->state,
                    'lga' => $request->lga
                ]);
        }
        else{
            if(!empty($fieldagent->agent_id)){ $fa = $request->agent_id; } else { $fa = "0";}
            DB::table('fieldagent_user')->insert([
                'user_id' => $user->id,
                'agent_id' => $fa,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'state' => $request->state,
                'lga' => $request->lga
            ]);
        }

//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->save();
        session()->flash('success', 'Information updated successfully');
        return back();
    }


    public function profile($id){
        $user = User::find($id);
        $fieldagent = DB::table('fieldagent_user')
            ->where('user_id','=', $user->id)->first();
//        dd($fieldagent);
        return view('FieldAgent.profile', [
            'user' => $user,
            'fieldagent' => $fieldagent
        ]);
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
