<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Auth;
class ServiceController extends Controller

{

//funcion para busqueda de servicio por titulo
  public function buscar(Request $datos)
  {
    $service = [];

    if($datos->input('title')){
        $service = Service::where('title', 'like', '%' . $datos->input('title') . '%');
      }

    if ($service) {
        $service->Where('active', '=', '1');
          }

      if ($service) {
          $service = $service->get();
      }

    // $vac= compact('service');

    return view('/search', compact('service'));
  }

//funcion para impresion de listado de servicios
  public function listadoPublico(){
//si el servicio no esta activo no se muestra
    $services = Service::Where('active', '=', '1')->get();

    $vac = compact("services");

    return view("/search", $vac);
  }

//funcion para impresion de listado de servicios para admin
  public function listado(){
    $usuarioLog = Auth::user();

    if($usuarioLog == null){
      return redirect('/search');
    }

    $services = Service::all();

    $vac = compact("services");

    return view("admin", $vac);
  }

//funcion para agregado de servicios
  public function agregarServicio(Request $req){

    $reglas = [
      "title" => "string|min:3|max:25|required",
      "description" => "string|min:5|required",
    ];

    $mensajes = [
      "string" => "El campo :attribute debe ser un texto",
      "min" => "El campo :attribute debe tener mínimo :min caractéres",
      "max" => "El campo :attribute debe tener un máximo de :max",
    ];

    $this->validate($req, $reglas, $mensajes);

    $servicioNuevo = new Service();

    $servicioNuevo->title = $req["title"];
    $servicioNuevo->description = $req["description"];
    $servicioNuevo->active = $req["active"];

    // dd($servicioNuevo);

    $servicioNuevo->save();

    return redirect("/admin");
  }

//funcion para borrado de servicios
  public function borrarServicio(Request $formulario){
    $id = $formulario->id;

    $service = Service::find($id);

    $service->delete();

    return redirect('/admin');
  }

  public function detallar(Request $data, $id)
  {
    $service = Service::find($id);

    $vac = compact("service");

    return view("editarServicio", $vac);
  }

  public function editarServicio(Request $data, $id)
  {
    $this->validate($data, [
      'title' => ['string', 'min:3'],
      'description'=> ['string', 'min:5'],
      'active' => ['boolean']
    ]);

    $services = Service::find($id);
    if(Service::find($services->id)) {
      $services->title = $data['title'];
      $services->description = $data['description'];
      $services->active = $data['active'];
    }

    $services->save();

    return redirect('/admin');
  }
}
