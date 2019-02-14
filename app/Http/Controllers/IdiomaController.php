<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class IdiomaController extends Controller
{

    public function guardaIdioma(Request $request){

        $this->validate($request, ['idioma']);
        $idiomaFinal = $request->input('idioma');
      //  dd($idiomaFinal);
        //\Request::cookie('idioma', 'es');

       return redirect('/catalog/create')->withCookie(cookie('idioma', $idiomaFinal , 60 * 24 * 365));
     }
}

