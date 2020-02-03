@extends('layouts.app')

<!-- HEAD -->
@section('head')
  <link rel="stylesheet" href="/css/agregarServicio.css">

@endsection

<!--MAIN-->
@section('main')

  <!--Formulario registro de servicio-->
  <form class="regServ" action="/agregarServicio" method="post">
    {{csrf_field()}}

    <div class="campos">

      <label class="datos" for="title">Nombre de servicio</label>
      <input class="texto" type="text" name="title" placeholder="Nombre Servicio" value="{{old('title')}}">

      @error ('title')

        <div class="alert alert-danger">
          {{$message}}
        </div>

      @enderror
    </div>

    <div class="">

      <label class="datos" for="description">Descripción</label>
      <input id="descrip" name="description" placeholder="Descripción" value="{{old('description')}}"></input>

      @error ('description')

        <div class="alert alert-danger">
          {{$message}}
        </div>

      @enderror
    </div>

    <div class="">

      <label class="datos" for="latitude">Latitud</label>
      <input id="latitude" name="latitude" placeholder="Latitud" value="{{old('latitude')}}"></input>

      @error ('latitude')

        <div class="alert alert-danger">
          {{$message}}
        </div>

      @enderror
    </div>

    <div class="">

      <label class="datos" for="longitude">Longitud</label>
      <input id="longitude" name="longitude" placeholder="Longitud" value="{{old('longitude')}}"></input>

      @error ('longitude')

        <div class="alert alert-danger">
          {{$message}}
        </div>

      @enderror
    </div>

    <div class="">

      <label class="check" for="active">Servicio activo</label>
      <input type="hidden" name="active" value="0">
      <input id="active" type="checkbox" name="active" value="1">

    </div>

    <div class="boton">

      <a href="/admin" class="button btn btn-outline-primary">
        Cancelar
      </a>

    </div>

    <div class="boton">

      <input type="submit" name="" class="button btn btn-outline-primary" value="Guardar Servicio">

    </div>
    
  </form>

@endsection
