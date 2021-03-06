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
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Business and Entrepreneurship Studies',
                'dept_code' => 'BES',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Transport Engineering and Technology',
                'dept_code' => 'TET',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Center for Professional Development',
                'dept_code' => 'CPD',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Aviation Technology',
                'dept_code' => 'AVI',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Transport Safety and Environment Studies',
                'dept_code' => 'TSES',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Logistics and Transport Studies',
                'dept_code' => 'LTS',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Postgraduate Studies',
                'dept_code' => 'PGD',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Mathematics Humanities and Social Studies',
                'dept_code' => 'MHSS',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Management Information System',
                'dept_code' => 'MIS',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Workshop Department',
                'dept_code' => 'WD',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Library Department',
                'dept_code' => 'LD',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Estate Unit',
                'dept_code' => 'EU',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Game Tutor',
                'dept_code' => 'GT',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Hall Supervisor',
                'dept_code' => 'HS',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Student Welfare',
                'dept_code' => 'SW',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Registrar Department',
                'dept_code' => 'RD',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
        Departments::create(
            [
                'dept_name' => 'Finance Department',
                'dept_code' => 'FD',
                'added_by' => 'NIT/STAFF/100',
            ]
        );
    }
}
