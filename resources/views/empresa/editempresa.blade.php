@extends('layouts.app')

@section('content')


<form method="POST" action="/empresa/{{$empresa->id}}" class="container" enctype="multipart/form-data">
    @method('PUT')
    @csrf

      <div class="form-group">
        <label for="exampleInputEmail1">Logotipo</label>
        <input type="file" class="form-control" name="logotipo">
      </div>

       @error('logotipo')
        <div class="alert alert-danger">La imagen debe tener mínimo 100 px de ancho y de alto</div>
    @enderror


      <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$empresa->nombre}}">
      </div>
      @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$empresa->correo_electronico}}" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-group">
        <label for="exampleInputEmail1">Sitio Web</label>
        <input type="text" class="form-control" id="sitio-web" name="sitio-web"  value="{{$empresa->sitio_web}}">
      </div>
      @error('sitio-web')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection