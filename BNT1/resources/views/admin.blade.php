@extends('layouts.app')

<!-- HEAD -->
@section('head')
  <link rel="stylesheet" href="/css/admin.css">
@endsection

<!--MAIN-->
@section('main')
{{-- @php
  dd($services);
@endphp --}}
  <div id="titulo" class="panel panel-success">
    <div class="panel-heading">Servicios disponibles</div>
  </div>

  <a class="agregar" href="/agregarServicio">
    <button type="button" class="button btn btn-outline-primary" name="button">Agregar Servicio</button>
  </a>

<!--tabla de servicios-->
  <table id="tabla" class="table table-striped">
    <thead class="tope">
      <tr>
        <th scope="col">Nº Servicio</th>
        <th scope="col">Nombre Servicio</th>
        <th scope="col">Descripción</th>
        <th scope="col">Latitud</th>
        <th scope="col">Longitud</th>
      </tr>
    </thead>
    <!--recorrido e impresion de cada servicio-->
    @forelse ($services as $service)
        <tbody>
          <tr>
            <th scope="row">{{$service->id}}</th>
            <td>{{$service->title}}</td>
            <td>{{$service->description}}</td>
            <td>{{$service->latitude}}</td>
            <td>{{$service->longitude}}</td>
            @if(Auth::check() && Auth::user()->isAdmin)
            <td>
              <form class="" action="/borrarServicio" method="post">
              {{csrf_field()}}
              <input type="hidden" class="button btn btn-outline-primary" name="id" value={{$service->id}}>
              <input type="submit" class="button btn btn-outline-primary" name="borrar" value="Borrar Servicio">
              </form>
            </td>
            <td>
              <form class="" action="{{url('editarServicio')}}/{{$service->id}}" method="get">
                <button id="button-agregar" type="submit" class="button btn btn-outline-primary">Editar Servicio</button>
              </form>
            </td>
          @endif
          </tr>
        </tbody>
    <!--si no hay servicios-->
    @empty
      <tr>
      <div class="none">
        <p>No hay servicios disponibles</p>
      </div>
      </tr>
    @endforelse
  </table>


@endsection
