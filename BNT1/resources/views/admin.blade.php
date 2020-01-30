@extends('layouts.app')

<!-- HEAD -->
@section('head')
@endsection

<!--MAIN-->
@section('main')
{{-- @php
  dd($services);
@endphp --}}
  <a href="/agregarServicio">
    <button type="button" class="button btn btn-outline-primary" name="button">Agregar Servicio</button>
  </a>
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
    <!--si el servicio no esta activo-->
      @unless ($service->active == 0)

      @endunless
    <!--si no hay servicios-->
    @empty
      <p>No hay servicios disponibles</p>
    @endforelse
  </table>


@endsection
