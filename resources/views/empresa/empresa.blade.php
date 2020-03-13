@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table container">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Sitio Web</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Editar</th>

          </tr>
        </thead>
        <tbody>
          
              @foreach ($empresas as $emp)
              <tr>
                @if ($emp->logotipo)
              <th scope="row"><img src="{{ asset('storage/' . $emp->logotipo) }}" alt="{{$emp->logotipo}}" width="70" class="rounded-circle"></th>
                 
                  @else
                  
                @endif
                <td><a href="empresa/{{$emp->id}}">{{$emp->nombre}}</a></td>
                <td>{{$emp->correo_electronico}}</td>
                <td>{{$emp->sitio_web}}</td>
                <td>
                  <form action="{{ route('empresa.destroy' , $emp->id)}}" method="POST">
                    @method('DELETE')
                    @csrf

                      <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                    
                </td>
                <td>
                  <a href="/empresa/{{$emp->id}}/edit" class="btn btn-warning">Editar</a>

                </td>
            </tr>
              @endforeach
            
          
        </tbody>
      </table>

      {{ $empresas->links() }}

      
        <a href="/empresa/create" class="btn btn-success">Crear Empresa</a>
      

</div>



@endsection