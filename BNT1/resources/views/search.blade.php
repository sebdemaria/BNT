@extends('layouts.app')

<!-- HEAD -->
@section('head')
@endsection

<!--MAIN-->
@section('main')

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
        @if ($service->active == 1)
          <tbody>
            <tr>
              <th scope="row">{{$service->id}}</th>
              <td>{{$service->title}}</td>
              <td>{{$service->description}}</td>
        @endif
            {{-- <!--si el servicio no esta activo-->
              @unless ($service->active == 0)

              @endunless             --}}
            </tr>
          </tbody>
      <!--si no hay servicios-->
      @empty
        <td>
        <p>No hay servicios disponibles</p>
        </td>
      @endforelse
    </table>

@endsection
