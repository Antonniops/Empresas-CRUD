@extends('layouts.app')

@section('content')

<div class="container">
    
           
    <div class="row align-items-center">
        <img src="{{ url('/storage/app/public/'.$emp->logotipo) }}" alt="image" class="rounded-circle col-1">

        <h2 class="col-2">{{$emp->nombre}}
        </h2>


    </div>
          
   
      <table class="table mt-5">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Borrar</th>
            <th scope="col">Editar</th>

          </tr>
        </thead>
        <tbody>
         @foreach ($empleados as $emple)
          <tr>
            
            <td>{{$emple->id}}</td>
            <td>
              <a href="/empleado/{{$emple->id}}">
                {{$emple->nombre}}</a>
            </td>
            <td>{{$emple->apellido}}</td>
            <td>{{$emple->correo_electronico}}</td>
            <td>{{$emple->telefono}}</td>
            <td>
                <form action="{{ route('empleado.destroy' , $emple->id)}}" method="POST">
                    
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn text-danger">
                        <i class="fas fa-minus-circle fa-2x"></i>
                    </button>
                </form>
            </td>
       
            <td>
                <a href=" {{ route('empleado.edit' , $emple->id)}} " class="btn text-info">
                    <i class="fas fa-edit fa-2x"></i>
                </a>
            </td>
            

          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $empleados->links() }}
    <a href="/empleado/create" class="btn btn-primary mb-3">Agregar Empleado</a>
     
    <br>
    <a href="/empresa">Volver a lista de empresas</a>
</div>

        

</div>




@endsection