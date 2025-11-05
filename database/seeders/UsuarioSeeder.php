<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003001',
            'nombre'          => 'Carlos Pérez',
            'correo'          => 'carlos.perez@example.com',
            'telefono'        => '3001234567',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003002',
            'nombre'          => 'María Gómez',
            'correo'          => 'maria.gomez@example.com',
            'telefono'        => '3012345678',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003003',
            'nombre'          => 'Andrés López',
            'correo'          => 'andres.lopez@example.com',
            'telefono'        => '3023456789',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Tarjeta De Identidad',
            'numeroDocumento' => '990011223',
            'nombre'          => 'Laura Rodríguez',
            'correo'          => 'laura.rodriguez@example.com',
            'telefono'        => '3034567890',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003005',
            'nombre'          => 'Javier Ramírez',
            'correo'          => 'javier.ramirez@example.com',
            'telefono'        => '3045678901',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003006',
            'nombre'          => 'Ana Torres',
            'correo'          => 'ana.torres@example.com',
            'telefono'        => '3056789012',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003007',
            'nombre'          => 'Felipe Castro',
            'correo'          => 'felipe.castro@example.com',
            'telefono'        => '3067890123',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '1002003008',
            'nombre'          => 'Diana Morales',
            'correo'          => 'diana.morales@example.com',
            'telefono'        => '3078901234',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Tarjeta De Identidad',
            'numeroDocumento' => '2003004001',
            'nombre'          => 'José Martínez',
            'correo'          => 'jose.martinez@example.com',
            'telefono'        => '3089012345',
        ]);

        Usuario::create([
            'tipoDocumento'   => 'Cedula De Ciudadania',
            'numeroDocumento' => '123456',
            'nombre'          => 'Paula Herrera',
            'correo'          => 'paula.herrera@example.com',
            'telefono'        => '3090123456',
        ]);




    }
}
    

