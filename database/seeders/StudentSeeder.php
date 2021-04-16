<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create(
            [
                'student_id' => 'NIT/BCFCF/2016/2022',
                'fullname' => 'Luhaga  Njuu',
                'program' => 'CFCF',
                'department' => 'LTS',
                'entry_year' => '2016',
                'registered' => 'YES',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
