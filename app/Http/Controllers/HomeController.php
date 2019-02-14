<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

/*    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        return view('home');
    }*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * Existen Redirecciones segun el rol de usuario
     */
    public function getHome(Request $request)
    {
      $request->user()->authorizeRoles(['user', 'admin']);

      if($request->user()->email == 'atrapa108@gmail.com'){

         return redirect()->action('DashboardController@getIndex');

      }else{

         return redirect()->action('CatalogController@getIndex');

      }
      //  return redirect()->action('CatalogController@getIndex');
        //return view('home');
    }
}
