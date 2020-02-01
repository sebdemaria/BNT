<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class VerifyAdmin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
 public function handle($request, Closure $next)
 {
   $usuario = Auth::user();

   if (isset($usuario)) {

     if(User::find($usuario->id)) {
       $isAdmin = $usuario->isAdmin;
     }
     //dd($isAdmin);
     if ($isAdmin == 0) {
       return redirect('/search');
     }
   }
   return $next($request);
  }
}
