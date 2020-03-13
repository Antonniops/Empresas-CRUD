<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Empresa::insert([
            'nombre' => 'Microsoft',
            'correo_electronico' => 'microsoft@gmail.com',
            'logotipo' => 'microsoftlogo.png',
            'sitio_web' => 'microsoft.com'
        ]);

    }
}
