<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Dependencia::create([
            'nombre'      => 'Cartera',
            'descripcion' => 'Gestión y seguimiento de los créditos otorgados a los clientes',
        ]);

        Dependencia::create([
            'nombre'      => 'Tesorería',
            'descripcion' => 'Administración de la liquidez y recursos financieros del banco',
        ]);

        Dependencia::create([
            'nombre'      => 'Banca Personal',
            'descripcion' => 'Atención y asesoría a clientes individuales en productos financieros',
        ]);

        Dependencia::create([
            'nombre'      => 'Banca Empresarial',
            'descripcion' => 'Servicios financieros especializados para empresas y corporaciones',
        ]);

        Dependencia::create([
            'nombre'      => 'Cajeros y Ventanilla',
            'descripcion' => 'Manejo de operaciones de efectivo y servicios básicos a clientes',
        ]);

        Dependencia::create([
            'nombre'      => 'Seguridad',
            'descripcion' => 'Control de fraudes, monitoreo de transacciones y seguridad física',
        ]);

        Dependencia::create([
            'nombre'      => 'Atención al Cliente',
            'descripcion' => 'Resolución de inquietudes, quejas y solicitudes de los clientes',
        ]);

        Dependencia::create([
            'nombre'      => 'Créditos y Riesgos',
            'descripcion' => 'Evaluación de solicitudes de crédito y análisis de riesgos financieros',
        ]);

        Dependencia::create([
            'nombre'      => 'Recursos Humanos',
            'descripcion' => 'Gestión de personal, nómina y bienestar de los empleados',
        ]);

        Dependencia::create([
            'nombre'      => 'Tecnología',
            'descripcion' => 'Soporte de sistemas, aplicaciones bancarias y banca digital',
        ]);
    }
}
