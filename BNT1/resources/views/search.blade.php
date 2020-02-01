@extends('layouts.app')

<!-- HEAD -->
@section('head')
  <link rel="stylesheet" href="/css/search.css">
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
      <input id="latitude" value="" name="latitude" class="form-control mr-sm-2" type="text" placeholder="Mi latitud" aria-label="Search" readonly>
      <input id="longitude" value="" name="longitude" class="form-control mr-sm-2" type="text" placeholder="Mi longitud" aria-label="Search" readonly>
      <button onclick="getLocation()" class="btn btn-outline-primary my-2 my-sm-0">Buscar mis coordenadas</button>

      {{-- <script>
        var x = document.getElementById("demo");
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }

        function showPosition(position) {
          x.innerHTML = "Latitude: " + position.coords.latitude +
          "<br>Longitude: " + position.coords.longitude;
        }
      </script> --}}

      {{-- obtención de localización de usuario --}}
      <script>
      if ("geolocation" in navigator) {
        /* la geolocalización está disponible */
        function success(Position) {
          var crd = Position.coords;
          var latitude = crd.latitude;
          var longitude = crd.longitude;

          console.log('Your current position is:');
          console.log('Latitude : ' + latitude);
          console.log('Longitude: ' + longitude);
          console.log('More or less ' + crd.accuracy + ' meters.');

          //reemplazo de datos de latitud y longitud automaticamente en value del input
          document.getElementById('latitude').value = crd.latitude;

          document.getElementById('longitude').value = crd.longitude;
        };

        navigator.geolocation.getCurrentPosition(success);

        } else {
        /* la geolocalización NO está disponible */
        console.log('la geolocalización no se encuentra disponible')
        }

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
    @php
      dd($service);
    @endphp
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
