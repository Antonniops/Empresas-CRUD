@extends('layouts.app')

@section('content')


<form method="POST" action="/empleado/{{$empleado->id}}" class="container">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$empleado->nombre}}">
      </div>
      @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
      <div class="form-group">
        <label for="exampleInputEmail1">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="{{$empleado->apellido}}">
      </div>

      @error('apellido')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
   
     
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$empleado->correo_electronico}}" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


      <div class="form-group">
        <label for="exampleFormControlSelect1">Empresa</label>
        <select class="form-control" name="empresa">
        @foreach ($empresas as $empr)
          <option value="{{$empr->id}}">{{$empr->nombre}}</option>
        @endforeach
        </select>
      </div>

      @error('empresa')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      

      <div class="form-group">
        <label for="exampleInputEmail1">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$empleado->telefono}}">
      </div>

      @error('telefono')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection