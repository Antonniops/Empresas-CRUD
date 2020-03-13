<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        //Paginacion de empresas
        $empresas = Empresa::paginate(4);

        return view('empresa/empresa', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresa/create');
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
        $validatedData = $request->validate([
            'nombre' => 'required',
            'logotipo' => 'required|dimensions:min_width=100,min_height=100'
        ]);

        $emp = new Empresa;
        $emp->nombre = $request->input('nombre');
        $emp->correo_electronico = $request->input('email');

        //Obtener nombre imagen
        $nombre = $request->file('logotipo')->getClientOriginalName();

        //Almacenar imagen 
        $request->file('logotipo')->storeAs('public', $nombre);

        //Guardar ruta de imagen en la BD
        $emp->logotipo = $nombre;
        
        $emp->sitio_web = $request->input('sitio-web');
        $emp->save();

        return redirect()->action('EmpresaController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        
        //Empresa según id
        $emp = Empresa::findOrFail($empresa->id);

        //Empleados de la empresa
        $empleados = Empresa::findOrFail($empresa->id)->empleados()->paginate(5);

        return view('empresa/detallesempresa', ['emp'=>$emp, 'empleados'=>$empleados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //Empresas disponibles para el desplegable
        $empresas_disponibles = Empresa::select('nombre')->get();

        //Detalles de la empresa para la recarga de datos en el formulario
        $emp = Empresa::findOrFail($empresa->id);

        return view('empresa/editempresa', ['empresa'=>$emp, 'empresas' => $empresas_disponibles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //Validacion de datos
        $validatedData = $request->validate([
            'nombre' => 'required',
            'logotipo' => 'required|dimensions:min_width=100,min_height=100'
        ]);

        $emp = Empresa::findOrFail($empresa->id);

        $emp->nombre = $request->input('nombre');
        $emp->correo_electronico = $request->input('email');

        //Obtener nombre imagen
        $nombre = $request->file('logotipo')->getClientOriginalName();

        //Almacenar imagen 
        $request->file('logotipo')->storeAs('public', $nombre);

        //Guardar ruta de imagen en la BD
        $emp->logotipo = $nombre;
        
        $emp->sitio_web = $request->input('sitio-web');

        $emp->save();

        return redirect('/empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
        echo $empresa->id;
        $emp = Empresa::findOrFail($empresa->id);

        $emp->delete();

        return redirect('/empresa');
    }
}
