@extends('layouts.app')

<!-- HEAD -->
@section('head')
@endsection

<!--MAIN-->
@section('main')

  <!--buscador-->
  <form id="buscador" class="form-inline" action="" method="post">
    {{csrf_field()}}
  <input id="search" name="title" class="form-control mr-sm-2" type="text" placeholder="Buscar Servicio..." aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>

  @if (isset($service))
    @php
      dd($service);
    @endphp
    <div class="panel panel-success">
        <div class="panel-heading">Resultado de la busqueda</div>
        <div class="panel-body">
    <!--tabla de servicios-->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nº Servicio</th>
            <th scope="col">Nombre Servicio</th>
            <th scope="col">Descripción</th>
          </tr>
        </thead>
        <!--recorrido e impresion de cada servicio-->
        @forelse ($services as $service)
            <tbody>
              <tr>
                <th scope="row">{{$service->id}}</th>
                <td>{{$service->title}}</td>
                <td>{{$service->description}}</td>
              </tr>
            </tbody>
        <!--si no hay servicios-->
        @empty
          <td>
          <p>No hay servicios disponibles</p>
          </td>
        @endforelse
      </table>
  @endif

@endsection
