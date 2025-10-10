<?php

namespace Database\Seeders;

use App\Models\EmpleadoDependencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoDependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmpleadoDependencia::create(['idEmpleado' => 1, 'idDependencia' => 1]);
        EmpleadoDependencia::create(['idEmpleado' => 2, 'idDependencia' => 3]);
        EmpleadoDependencia::create(['idEmpleado' => 3, 'idDependencia' => 2]);
        EmpleadoDependencia::create(['idEmpleado' => 4, 'idDependencia' => 5]);
        EmpleadoDependencia::create(['idEmpleado' => 5, 'idDependencia' => 4]);
        EmpleadoDependencia::create(['idEmpleado' => 6, 'idDependencia' => 1]);
        EmpleadoDependencia::create(['idEmpleado' => 7, 'idDependencia' => 2]);
        EmpleadoDependencia::create(['idEmpleado' => 8, 'idDependencia' => 3]);
        EmpleadoDependencia::create(['idEmpleado' => 9, 'idDependencia' => 4]);
        EmpleadoDependencia::create(['idEmpleado' => 10, 'idDependencia' => 5]);
    }
}
