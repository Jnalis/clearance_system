<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Departments::create(
            [
                'dept_name' => 'Computing and Communication Technology',
                'dept_code' => 'CCT',
                'added_by' => 1,
            ]

        );
    }
}
