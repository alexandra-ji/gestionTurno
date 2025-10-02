<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([
            'nombreServicio' => 'Apertura de Cuenta de Ahorros',
            'descripcion'    => 'Permite a los clientes abrir cuentas de ahorro con beneficios.',
            'idDependencia'  => 5, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Apertura de Cuenta Corriente',
            'descripcion'    => 'Servicio para clientes que requieren cuentas corrientes.',
            'idDependencia'  => 5, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Crédito Hipotecario',
            'descripcion'    => 'Préstamos para adquisición de vivienda.',
            'idDependencia'  => 7, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Crédito Empresarial',
            'descripcion'    => 'Financiamiento diseñado para empresas y pymes.',
            'idDependencia'  => 6, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Pago de Servicios Públicos',
            'descripcion'    => 'Posibilidad de pagar facturas en cajeros y ventanillas.',
            'idDependencia'  => 8, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Seguros de Vida',
            'descripcion'    => 'Cobertura en caso de fallecimiento o incapacidad.',
            'idDependencia'  => 10, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Atención Telefónica',
            'descripcion'    => 'Soporte y consultas a través de call center.',
            'idDependencia'  => 9, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Inversiones en CDT',
            'descripcion'    => 'Certificados de depósito a término con rentabilidad fija.',
            'idDependencia'  => 12, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Plataforma de Banca en Línea',
            'descripcion'    => 'Acceso a operaciones bancarias desde la web.',
            'idDependencia'  => 9, 
        ]);

        Servicio::create([
            'nombreServicio' => 'Aplicación Móvil',
            'descripcion'    => 'App para realizar transacciones desde el celular.',
            'idDependencia'  => 11, 
        ]);
    }
}
