<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Empresa;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Saco el listado de empresas disponibles para iterarlo en el desplegable 
        $empresas_disponibles = Empresa::select('id', 'nombre')->get();

        return view('empleado/creatempleado', ['empresas' => $empresas_disponibles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //Validacion de los campos requeridos
        $validatedData = $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'empresa'=>'required'
        ]);

        $emple = new Empleado;
        $emple->nombre = $request->input('nombre');
        $emple->apellido = $request->input('apellido');
        $emple->empresa = $request->input('empresa');
        $emple->correo_electronico = $request->input('email');
        $emple->telefono = $request->input('telefono');

        $emple->save();

        return redirect('/empresa/' . $emple->empresa);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
        
        //Empleado a mostrar
        $emp = Empleado::findOrFail($empleado->id);

        //Empresa a la que pertenece
        $empresa = Empleado::findOrFail($empleado->id)->empresa_pertenece;

        return view('empleado/detallempleado', ['emp'=>$emp, 'empresa'=>$empresa]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
    
        //Empresas disponibles, para el desplegable
        $empresas_disponibles = Empresa::select('id', 'nombre')->get();

        //Datos del empleado para mostrar en el formulario
        $emp = Empleado::findOrFail($empleado->id);

        return view('empleado/editempleado', ['empleado'=>$emp, 'empresas' => $empresas_disponibles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //Validación de datos
        $validatedData = $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'empresa'=>'required'
        ]);

        //Actualización del empleado
        $emple = Empleado::findOrFail($empleado->id);

        $emple->nombre = $request->input('nombre');
        $emple->apellido = $request->input('apellido');
        $emple->empresa = $request->input('empresa');
        $emple->correo_electronico = $request->input('email');
        $emple->telefono = $request->input('telefono');

        $emple->save();

        return redirect('/empresa/' . $emple->empresa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //Encontramos el empleado a borrar
        $emp = Empleado::findOrFail($empleado->id);

        //Lo eliminamos mediante el modelo
        $emp->delete();

        return back();
    }
}
