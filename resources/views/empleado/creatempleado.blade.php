@extends('layouts.app')

@section('content')


<form method="POST" action="/empleado" class="container">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
      @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

      <div class="form-group">
        <label for="exampleInputEmail1">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido">
      </div>
      @error('apellido')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
     
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


      <div class="form-group">
        <label for="exampleFormControlSelect1">Empresa</label>
        <select class="form-control" name="empresa">
    
        
        @foreach ($empresas as $emp)
          <option value="{{$emp->id}}">{{$emp->nombre}}</option>
        @endforeach

          
       
        </select>
      </div>
      @error('empresa')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror

      <div class="form-group">
        <label for="exampleInputEmail1">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono">
      </div>

      @error('telefono')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection