@extends('layouts.app')

@section('content')

<div class="container">
    
                    
                    
        <div class="card mb-3" style="width: 18rem;">
        <div class="card-header">
            Nombre: {{$emp->nombre}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Apellido:{{$emp->apellido}}</li>
            <li class="list-group-item">Empresa: {{$empresa->nombre}}</li>
            <li class="list-group-item">Teléfono: {{$emp->telefono}}</li>
            <li class="list-group-item">Correo electrónico: {{$emp->correo_electronico}}</li>
        </ul>
        </div>

        <a href="/empresa/{{$empresa->id}}">Volver a lista de empleados</a>

</div>




@endsection