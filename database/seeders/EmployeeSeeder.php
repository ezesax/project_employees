<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();

        $employee->name = 'Alan';
        $employee->lastname = 'Navia';
        $employee->birthday = date("Y-m-d", mktime(0, 0, 0, 7, 14, 1989));
        $employee->roll_on_date = date("Y-m-d", mktime(0, 0, 0, 12, 1, 2019));
        $employee->project_id = 1;
        $employee->save();

        $employee = new Employee();

        $employee->name = 'Nazarena';
        $employee->lastname = 'Rueda';
        $employee->birthday = date("Y-m-d", mktime(0, 0, 0, 3, 22, 1999));
        $employee->roll_on_date = date("Y-m-d", mktime(0, 0, 0, 5, 2, 2020));
        $employee->project_id = 1;
        $employee->save();

        $employee = new Employee();

        $employee->name = 'Sol';
        $employee->lastname = 'Parini';
        $employee->birthday = date("Y-m-d", mktime(0, 0, 0, 3, 22, 1995));
        $employee->roll_on_date = date("Y-m-d", mktime(0, 0, 0, 8, 8, 2017));
        $employee->project_id = 2;
        $employee->save();

        $employee = new Employee();

        $employee->name = 'Nicolas';
        $employee->lastname = 'Dell Oro';
        $employee->birthday = date("Y-m-d", mktime(0, 0, 0, 8, 5, 1982));
        $employee->roll_on_date = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2012));
        $employee->project_id = 2;
        $employee->save();

        $employee = new Employee();

        $employee->name = 'Leonardo';
        $employee->lastname = 'Buret';
        $employee->birthday = date("Y-m-d", mktime(0, 0, 0, 6, 17, 1984));
        $employee->roll_on_date = date("Y-m-d", mktime(0, 0, 0, 8, 1, 2010));
        $employee->project_id = 3;
        $employee->save();

        $employee = new Employee();

        $employee->name = 'Alexis';
        $employee->lastname = 'Cortes';
        $employee->birthday = date("Y-m-d", mktime(0, 0, 0, 2, 2, 1990));
        $employee->roll_on_date = date("Y-m-d", mktime(0, 0, 0, 3, 1, 2015));
        $employee->project_id = 3;
        $employee->save();
    }
}
