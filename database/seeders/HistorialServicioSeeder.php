<?php

namespace Database\Seeders;

use App\Models\HistorialServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorialServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistorialServicio::create([
            'fechaSalida' => '2025-10-25 08:30:00',
            'idTurno' => 1,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-25 09:30:00',
            'idTurno' => 2,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-24 10:30:00',
            'idTurno' => 3,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-23 11:30:00',
            'idTurno' => 4,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-22 12:30:00',
            'idTurno' => 5,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-21 13:30:00',
            'idTurno' => 6,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-26 14:30:00',
            'idTurno' => 7,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-26 15:30:00',
            'idTurno' => 8,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-20 16:30:00',
            'idTurno' => 9,
        ]);

        HistorialServicio::create([
            'fechaSalida' => '2025-10-19 17:30:00',
            'idTurno' => 10,
        ]);
    }
    }

