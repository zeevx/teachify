<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadmin'
        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'fieldagent'
        ]);
        Role::create([
            'name' => 'agent'
        ]);
        Role::create([
            'name' => 'school'
        ]);
        Role::create([
            'name' => 'teacher'
        ]);
    }
}
