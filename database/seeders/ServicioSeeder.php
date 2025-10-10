<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        Servicio::create([
            'nombreServicio' => 'Apertura de Cuenta de Ahorros',
            'descripcion'    => 'Permite a los clientes abrir cuentas de ahorro con beneficios.',
            'idDependencia'  => 3, // Banca Personal
        ]);

        Servicio::create([
            'nombreServicio' => 'Apertura de Cuenta Corriente',
            'descripcion'    => 'Servicio para clientes que requieren cuentas corrientes.',
            'idDependencia'  => 3, // Banca Personal
        ]);

        Servicio::create([
            'nombreServicio' => 'Crédito Hipotecario',
            'descripcion'    => 'Préstamos para adquisición de vivienda.',
            'idDependencia'  => 4, // Banca Empresarial
        ]);

        Servicio::create([
            'nombreServicio' => 'Crédito Empresarial',
            'descripcion'    => 'Financiamiento diseñado para empresas y pymes.',
            'idDependencia'  => 4, // Banca Empresarial
        ]);

        Servicio::create([
            'nombreServicio' => 'Pago de Servicios Públicos',
            'descripcion'    => 'Posibilidad de pagar facturas en cajeros y ventanillas.',
            'idDependencia'  => 5, // Cajeros y Ventanilla
        ]);

        Servicio::create([
            'nombreServicio' => 'Seguros de Vida',
            'descripcion'    => 'Cobertura en caso de fallecimiento o incapacidad.',
            'idDependencia'  => 6, // Seguridad
        ]);

        Servicio::create([
            'nombreServicio' => 'Atención Telefónica',
            'descripcion'    => 'Soporte y consultas a través de call center.',
            'idDependencia'  => 7, // Atención al Cliente
        ]);

        Servicio::create([
            'nombreServicio' => 'Inversiones en CDT',
            'descripcion'    => 'Certificados de depósito a término con rentabilidad fija.',
            'idDependencia'  => 8, // Créditos y Riesgos
        ]);

        Servicio::create([
            'nombreServicio' => 'Plataforma de Banca en Línea',
            'descripcion'    => 'Acceso a operaciones bancarias desde la web.',
            'idDependencia'  => 10, // Tecnología
        ]);

        Servicio::create([
            'nombreServicio' => 'Aplicación Móvil',
            'descripcion'    => 'App para realizar transacciones desde el celular.',
            'idDependencia'  => 10, // Tecnología
        ]);
    }
}
