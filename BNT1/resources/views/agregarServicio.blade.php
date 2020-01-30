@extends('layouts.app')

<!-- HEAD -->
@section('head')
@endsection

<!--MAIN-->
@section('main')

<!--Formulario registro de servicio-->
<form class="regServ" action="/agregarServicio" method="post">
  {{csrf_field()}}
  <div class="campos">
    <label for="title">Nombre de servicio</label>
    <input type="text" name="title" placeholder="Nombre Servicio" value="{{old('title')}}">
    @error ('title')
      <div class="alert alert-danger">
        {{$message}}
      </div>
    @enderror
  </div>

  <div class="">
    <label for="description">Descripción</label>
    <textarea type="text" name="description" placeholder="Descripción" value="{{old('description')}}" rows="8" cols="80"></textarea>
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
    <input type="submit" name="" value="Guardar Servicio">
  </div>
</form>

@endsection
