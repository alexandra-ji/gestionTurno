<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Empleado::create([
            'nombreCompleto'   => 'Carlos Andrés Ramírez',
            'numeroDocumento'  => '1002003001',
            'telefono'         => '3104567890',
            'correo'           => 'carlos.ramirez@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'María Fernanda López',
            'numeroDocumento'  => '1002003002',
            'telefono'         => '3209876543',
            'correo'           => 'maria.lopez@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Andrés Felipe Torres',
            'numeroDocumento'  => '1002003003',
            'telefono'         => '3112233445',
            'correo'           => 'andres.torres@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Laura Sofía Martínez',
            'numeroDocumento'  => '1002003004',
            'telefono'         => '3125566778',
            'correo'           => 'laura.martinez@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Julián Esteban Rodríguez',
            'numeroDocumento'  => '1002003005',
            'telefono'         => '3131122334',
            'correo'           => 'julian.rodriguez@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Natalia Alejandra Gómez',
            'numeroDocumento'  => '1002003006',
            'telefono'         => '3144455667',
            'correo'           => 'natalia.gomez@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Santiago David Herrera',
            'numeroDocumento'  => '1002003007',
            'telefono'         => '3157788990',
            'correo'           => 'santiago.herrera@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Paula Andrea Castillo',
            'numeroDocumento'  => '1002003008',
            'telefono'         => '3168899001',
            'correo'           => 'paula.castillo@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Felipe Alejandro Suárez',
            'numeroDocumento'  => '1002003009',
            'telefono'         => '3179900112',
            'correo'           => 'felipe.suarez@banco.com',
        ]);

        Empleado::create([
            'nombreCompleto'   => 'Diana Carolina Vargas',
            'numeroDocumento'  => '1002003010',
            'telefono'         => '3180011223',
            'correo'           => 'diana.vargas@banco.com',
        ]);
    }
}
