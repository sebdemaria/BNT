@extends('layouts.app')

<!-- HEAD -->
@section('head')
@endsection

<!--MAIN-->
@section('main')
  {{-- <ul style="color:red" class="errores">
    @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
    @endforeach
  </ul> --}}

<!--Formulario registro de servicio-->
<form class="regServ" action="" method="post">
  {{csrf_field()}}
  <div class="campos">
    <label for="title">Nombre de servicio</label>
    <input type="text" name="title" placeholder="Nombre Servicio" value="{{$service->title}}">
    @error ('title')
      <div class="alert alert-danger">
        {{$message}}
      </div>
    @enderror
  </div>

  <div class="">
    <label for="description">Descripción</label>
    <textarea type="text" name="description" placeholder="Descripción" value="{{$service->description}}" rows="8" cols="80"></textarea>
    @error ('description')
      <div class="alert alert-danger">
        {{$message}}
      </div>
    @enderror
  </div>

  <div class="">
    <label for="active">Servicio activo</label>
    <input type="hidden" name="active" value="0">
    <input id="active" type="checkbox" name="active" value="1">
  </div>

  <div class="">
    <a href="/admin" class="button btn btn-outline-primary">
      Cancelar
    </a>
  </div>

  <div class="">
    <input type="submit" name="" class="button btn btn-outline-primary" value="Actualizar Servicio">
  </div>
</form>

@endsection
