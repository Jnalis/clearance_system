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
        Usertypes::create(
            [
                'usertype_name' => 'Head of Department',
                'usertype_code' => 'HOD',
                'added_by' => 1,
            ]
        );
        Usertypes::create(
            [
                'usertype_name' => 'Busrar',
                'usertype_code' => 'Busrar',
                'added_by' => 1,
            ]
        );
        Usertypes::create(
            [
                'usertype_name' => 'Dean of Student',
                'usertype_code' => 'Dean',
                'added_by' => 1,
            ]
        );
        Usertypes::create(
            [
                'usertype_name' => 'Resource Allocator',
                'usertype_code' => 'RA',
                'added_by' => 1,
            ]
        );
        Usertypes::create(
            [
                'usertype_name' => 'Registrar',
                'usertype_code' => 'Registrar',
                'added_by' => 1,
            ]
        );
    }
}
