<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Staff::create([

            'firstname' => 'Juvenalis',
            'secondname' => 'Amandi',
            'lastname' => 'Swai',
            'username' => 'NIT/STAFF/100',
            'usertype' => 'Admin',
            'department' => 'Computing and Communication Technology',
            'password' => Hash::make('123456'),

        ]);
        User::create([

            'user_id' => 'NIT/STAFF/100',
            'user_type' => 'Admin',
            'added_by' => 1,
            'password' => Hash::make('123456'),

        ]);
    }
}
