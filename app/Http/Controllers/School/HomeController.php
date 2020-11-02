<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function submit_profile_info(Request $request){
        $user = User::find($request->id);
        $fieldagent = DB::table('agent_user')
            ->where('user_id','=', $user->id)->first();
        if(!empty($fieldagent)){
            DB::table('agent_user')
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
            DB::table('agent_user')->insert([
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
        $teacher = DB::table('teacher_user')
            ->where('user_id','=', $user->id)->first();
        return view('School.profile', [
            'user' => $user,
            'fieldagent' => $teacher
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
