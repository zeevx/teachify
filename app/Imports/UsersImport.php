<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function  __construct($all, $state, $district, $lga, $school_id)
    {
        $this->all = $all;
        $break = explode(',', $all);
        $this->agent_id = $break[0];
        $this->fieldagent_id = $break[1];
        $this->id = $break[2];
        $this->state = $state;
        $this->district = $district;
        $this->lga = $lga;
        $this->school_id = $school_id;

    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(100, 999)
                . mt_rand(100, 999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $password = str_shuffle($pin);
            $user = new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => Hash::make($password)
            ]);
            $user->verified = "true";
            if($user->save()){
                DB::table('role_user')->insert([
                    'role_id' => $this->id,
                    'user_id' => $user->id,
                ]);

                if ($this->id == '5'){
                    DB::table('school_user')->insert([
                        'user_id' => $user->id,
                        'agent_id' => $this->agent_id,
                        'fieldagent_id' => $this->fieldagent_id,
                        'phone' => $row[2],
                        'bank' => $row[3],
                        'account_no' => $row[4],
                        'state' => $this->state,
                        'district' => $this->district,
                        'lga' => $this->lga,
                        'address' => $row[5]
                    ]);
                }
                if ($this->id == '6'){
                    DB::table('teacher_user')->insert([
                        'user_id' => $user->id,
                        'agent_id' => $this->agent_id,
                        'fieldagent_id' => $this->fieldagent_id,
                        'school_id' => $this->school_id,
                        'phone' => $row[2],
                        'bvn' => $row[3],
                        'dob' => $row[4],
                        'gender' => $row[5],
                        'state' => $this->state,
                        'district' => $this->district,
                        'lga' => $this->lga,
                        'address' => $row[6]
                    ]);
                }

                $data = array(
                    'name' => $user->name,
                    'email' => $user->email,
                    'pass' => $password
                );
                Mail::send('Mail.new', $data, function($message) use ($user) {
                    $message->to($user->email, 'New Account Created')->subject
                    ('Teachify Account Details');
                    $message->from(env('MAIL_FROM_ADDRESS'),'Teachify NG');
                });
                Mail::send('Mail.register-2', $data, function($message) {
                    $message->to(env('MAIL_FROM_ADDRESS'), 'New Account Created')->subject
                    ('Teachify Account Created');
                    $message->from(env('MAIL_FROM_ADDRESS'),'Teachify NG');
                });
            }

        }
    }
}
