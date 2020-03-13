<?php

use Illuminate\Database\Seeder;
use App\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i++) { 
            # code...
            Empleado::insert([
                'nombre' => 'user'.$i,
                'apellido' => 'apell' . $i,
                'empresa' => 1,
                'correo_electronico' => 'user'.$i.'@gmail.com',
                'telefono' => '98238392'.$i
            ]);
        }
    }
}
