@extends('layouts.app')

<!-- HEAD -->
@section('head')
  <link rel="stylesheet" href="/css/search.css">
  <script src="jquery-2.1.4.js"></script>
@endsection

<!--MAIN-->
@section('main')

  <!--buscador-->
  <form id="buscador" class="form-inline" action="" method="get">
    {{csrf_field()}}
    <div class="insert">
      <input id="search" name="title" class="form-control mr-sm-2" type="text" placeholder="Buscar Servicio..." aria-label="Search">
    </div>
    <div class="filtros">
      <input id="latitude" name="latitude" class="form-control mr-sm-2" type="text" placeholder="Mi latitud" aria-label="Search">
      <input id="longitude" name="longitude" class="form-control mr-sm-2" type="text" placeholder="Mi longitud" aria-label="Search">
      <button id="location-button" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar mis coordenadas</button>
      <script>
        $('#location-button').click(function(){
          if (navigator.geolocation) { //check if geolocation is available
                    navigator.geolocation.getCurrentPosition(function(position){
                      console.log(position);
                    });
                  }
                });
        // $('#location-button').click(function(){
        //   if(navigator.geolocation)
        //     navigation.geolocation.getCurrentPosition(function(position){
        //       console.log(position);
        //     });
        //   else
        //     console.log("geolocation is not supported");
        //   });
      </script>
    </div>
    <div class="filtros">
      <select id="select" class="btn btn-primary dropdown-toggle" name="distance" form="distance">
        <option value="null" selected>Distancia al servicio</option>
        <option value="2">2km</option>
        <option value="10">10km</option>
        <option value="100">100km</option>
        <option value="anywhere">Anywhere</option>
      </select>
    </div>
    <div class="submit">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </div>
  </form>

  @if ($service)
    {{-- @php
      dd($service);
    @endphp --}}
    <div id="resultado" class="panel panel-success">
        <div class="panel-heading">Resultado de la busqueda</div>
    </div>

    <!--tabla de servicios-->
    <table id="tabla" class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nº Servicio</th>
          <th scope="col">Nombre Servicio</th>
          <th scope="col">Descripción</th>
        </tr>
      </thead>
      <!--recorrido e impresion de cada servicio-->
      @forelse ($service as $service)
        <tbody>
          <tr>
            <th scope="row">{{$service->id}}</th>
            <td>{{$service->title}}</td>
            <td>{{$service->description}}</td>
          </tr>
        <!--si no hay servicios-->
        @empty
          <tr>
          <div class="none">
            <p>No hay servicios disponibles</p>
          </div>
          </tr>
      @endforelse
        </tbody>
    </table>
  @endif

@endsection
