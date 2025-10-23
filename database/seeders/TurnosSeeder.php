<?php

namespace Database\Seeders;

use App\Models\Turnos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        Turnos::create([
            'codigoTurno' => 'T0001',
            'estadoTurno' => 'Pendiente',
            'fecha'      => '2025-10-25',
            'horaInicio' => '08:00:00',
            'horaFin'    => '08:30:00',
            'idUsuario'  => 1,
            'idServicio' => 2,
            'idEmpleado' => 1,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0002',
            'estadoTurno' => 'En Atención',
            'fecha'      => '2025-10-25',
            'horaInicio' => '09:00:00',
            'horaFin'    => '09:30:00',
            'idUsuario'  => 2,
            'idServicio' => 3,
            'idEmpleado' => 2,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0003',
            'estadoTurno' => 'Atendido',
            'fecha'      => '2025-10-24',
            'horaInicio' => '10:00:00',
            'horaFin'    => '10:30:00',
            'idUsuario'  => 3,
            'idServicio' => 1,
            'idEmpleado' => 3,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0004',
            'estadoTurno' => 'Cancelado',
            'fecha'      => '2025-10-23',
            'horaInicio' => '11:00:00',
            'horaFin'    => '11:30:00',
            'idUsuario'  => 4,
            'idServicio' => 5,
            'idEmpleado' => 4,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0005',
            'estadoTurno' => 'Ausente',
            'fecha'      => '2025-10-22',
            'horaInicio' => '12:00:00',
            'horaFin'    => '12:30:00',
            'idUsuario'  => 5,
            'idServicio' => 4,
            'idEmpleado' => 5,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0006',
            'estadoTurno' => 'Reasignado',
            'fecha'      => '2025-10-21',
            'horaInicio' => '13:00:00',
            'horaFin'    => '13:30:00',
            'idUsuario'  => 6,
            'idServicio' => 2,
            'idEmpleado' => 6,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0007',
            'estadoTurno' => 'Pendiente',
            'fecha'      => '2025-10-26',
            'horaInicio' => '14:00:00',
            'horaFin'    => '14:30:00',
            'idUsuario'  => 7,
            'idServicio' => 3,
            'idEmpleado' => 7,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0008',
            'estadoTurno' => 'En Atención',
            'fecha'      => '2025-10-26',
            'horaInicio' => '15:00:00',
            'horaFin'    => '15:30:00',
            'idUsuario'  => 8,
            'idServicio' => 1,
            'idEmpleado' => 8,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0009',
            'estadoTurno' => 'Atendido',
            'fecha'      => '2025-10-20',
            'horaInicio' => '16:00:00',
            'horaFin'    => '16:30:00',
            'idUsuario'  => 9,
            'idServicio' => 4,
            'idEmpleado' => 9,
        ]);

        Turnos::create([
            'codigoTurno' => 'T0010',
            'estadoTurno' => 'Cancelado',
            'fecha'      => '2025-10-19',
            'horaInicio' => '17:00:00',
            'horaFin'    => '17:30:00',
            'idUsuario'  => 10,
            'idServicio' => 5,
            'idEmpleado' => 10,
        ]);
    
        
    }
}
