<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Auth;
class ServiceController extends Controller

{
//funcion para impresion de listado de servicios
  public function listadoPublico(){

    $services = Service::all();

    $vac = compact("services");

    return view("/search", $vac);
  }

//funcion para impresion de listado de servicios
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

//funcion buscador
  // public function search(Request $req)
  //   {
  //       $services = Service::all();
  //       //coloco las movies como vacias para solo usar el filtro
  //       $movies = [];
  //       //si hay el filtro de genero entoces empiezo a filtrar por ese;
  //       if ($req->input('genre_id')) {
  //           $movies = Movie::where('genre_id', '=', $req->input('genre_id'));
  //       }
  //       //si envie el input del titulo entonces lo filtro
  //       if ($req->input('title')) {
  //           //si ya estaba el filtro de genero, le agrego el filtro de titulo
  //           if ($movies) {
  //               $movies->where('title', 'like', '%' . $req->input('title') . '%');
  //           } else {
  //               //sino solo filtro por el titulo
  //               $movies = Movie::where('title', 'like', '%' . $req->input('title') . '%');
  //           }
  //       }
  //       //si hay filtro entonces obtengo los datos con el metodo get
  //       if ($movies) {
  //           $movies = $movies->get();
  //       }
  //
  //       return view('movies/search', compact(['genres', 'movies']));
  //   }

}
