<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id){

        $user = User::find($id);
        if($user->hasRole("fieldagent")){
            $userinfo = DB::table('fieldagent_user')->where('user_id', '=', $id)->first();
//            dd($userinfo);
            $aid = DB::table('fieldagent_user')->where('user_id','=', $id)->first('agent_id');
            $assigned = User::find($aid->agent_id);
        }
        else{
            $userinfo = DB::table('agent_user')->where('user_id', '==', $id)->first();
            $assigned = "";
        }
        $agents = User::whereHas('roles', function($role) {
            $role->where('name', '=', 'agent');
        })->get();
        return view('profile', [
            'user' => $user,
            'userinfo'=> $userinfo,
            'agents' => $agents,
            'assigned' => $assigned
        ]);
    }
    public function submit_profile(Request $request){

        $user = User::find($request->id);
        if (empty($request->name) && !empty($request->role)){

            DB::table('role_user')
                ->where('user_id', $user->id)
                ->update(['role_id' => $request->role]);

        }
        elseif(empty($request->role) && $user->hasRole("fieldagent") && empty($request->agent)){

            DB::table('fieldagent_user')
                ->where('user_id', $user->id)
                ->update([
                    'phone' => $request->phone,
                    'gender' => $request->gender,
//                    'state' => $request->state,
//                    'lga' => $request->lga
                ]);
        }
        elseif(empty($request->role) && $user->hasRole("agent")){

            DB::table('agent_user')
                ->where('user_id', $user->id)
                ->update([
                    'phone' => $request->phone,
                    'gender' => $request->gender,
//                    'state' => $request->state,
//                    'lga' => $request->lga
                ]);
        }
        elseif(empty($request->role) && $user->hasRole("fieldagent") && !empty($request->agent)){
            DB::table('fieldagent_user')
                ->where('user_id', $user->id)
                ->update([
                    'agent_id' => $request->agent,
                ]);
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
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request){
        $id = $request->id;
        $user = User::find($id);

        if ($user->verified == "false"){
            $user->verified = "true";
            $data = array('name'=>$user->name,
                'status' => $user->verified
            );
            Mail::send('Mail.verified', $data, function($message) use ($user) {
                $message->to($user->email, 'Account Verification')->subject
                ('Teachify Account Verification');
                $message->from('teachify@test.com','Teachify NG');
            });
        }
        else{
            $user->verified = "false";
            $data = array('name'=>$user->name,
                'status' => $user->verified
            );
            Mail::send('Mail.verified', $data, function($message) use ($user) {
                $message->to($user->email, 'Account Verification')->subject
                ('Teachify Account Verifition');
                $message->from('teachify@test.com','Teachify NG');
            });
        }
        $data = array('name'=>$user->name,
        );
        $user->save();
        session()->flash('success','User Status Updated');
        return back();
    }

    public function index()
    {
        if (Gate::allows('superadmin')){
            $superAdmins = User::whereHas('roles', function($role) {
                $role->where('name', '=', 'superadmin');
            })->get();
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
            $users =User::all();
            return view('SuperAdmin.index', [
                'users' => $users,
                'superAdmins' => $superAdmins,
                'admin' => $admins,
                'fieldAgents' => $fieldAgents,
                'agents' => $agents,
                'teachers' => $teachers,
                'schools' => $schools
            ]);
        }
        if (Gate::allows('admin')){
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
        if (Gate::allows('fieldagent')){
            $id = Auth::user()->id;
            $my = DB::table('school_user')
                ->where('fieldagent_id', '=', $id)->get('user_id');
            $data = json_decode($my, true);
            $schools = User::whereIn('id', $data)
                ->get();
            ////
            $my2 = DB::table('teacher_user')
                ->where('fieldagent_id', '=', $id)->get('user_id');
            $data2 = json_decode($my2, true);
            $teachers = User::whereIn('id', $data2)
                ->get();
            ////
            $my3 = DB::table('fieldagent_user')
                ->where('id', '=', $id)->get('user_id');
            $data3 = json_decode($my3, true);
            $field_agents = User::whereIn('id',$data3)
                ->get();
            return view('FieldAgent.index', [
                'users' => $schools,
                'teachers' => $teachers,
                'schools' => $schools,
                'fieldagents' => $field_agents
            ]);
        }
        if (Gate::allows('agent')){
            $id = Auth::user()->id;
            $my = DB::table('school_user')
                ->where('agent_id', '=', $id)->get('user_id');
            $data = json_decode($my, true);
            $schools = User::whereIn('id', $data)
                ->get();
            ////
            $my2 = DB::table('teacher_user')
                ->where('agent_id', '=', $id)->get('user_id');
            $data2 = json_decode($my2, true);
            $teachers = User::whereIn('id', $data2)
                ->get();
            ////
            $my3 = DB::table('fieldagent_user')
                ->where('agent_id', '=', $id)->get('user_id');
            $data3 = json_decode($my3, true);
            $field_agents = User::whereIn('id',$data3)
                ->get();
            ////
            return view('Agent.index', [
                'teachers' => $teachers,
                'schools' => $schools,
                'users' => $schools,
                'field_agents' => $field_agents,
            ]);
        }
        if (Gate::allows('teacher')){
            $id = Auth::user()->id;
            $my2 = DB::table('teacher_user')
                ->where('agent_id', '=', $id)->get('user_id');
            $data2 = json_decode($my2, true);
            $teachers = User::whereIn('id', $data2)
                ->get();
            ////
            return view('Teacher.index', [
                'teachers' => $teachers,
            ]);
        }
        if (Gate::allows('school')){
            $id = Auth::user()->id;
            $my2 = DB::table('teacher_user')
                ->where('school_id', '=', $id)->get('user_id');
            $data2 = json_decode($my2, true);
            $teachers = User::whereIn('id', $data2)
                ->get();
            ////
            return view('School.index', [
                'teachers' => $teachers
            ]);
        }
        return view('home');
    }
}
