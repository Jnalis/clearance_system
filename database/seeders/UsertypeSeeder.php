<?php

namespace Database\Seeders;

use App\Models\Usertypes;
use Illuminate\Database\Seeder;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Usertypes::create(
            [
                'usertype_name' => 'Admin',
                'usertype_code' => 'Admin',
                'added_by' => 1,
            ]

        );
    }
}
