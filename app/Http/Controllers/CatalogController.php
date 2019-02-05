<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cliente;
use App\Http\Controllers\MailController;

class CatalogController extends Controller
{

  public function __construct(){

    $this->middleware('auth');
  }
    public function getIndex(){

      $clientes = Cliente::all();

      return view('catalog/index' , array('clientes'=>$clientes));
    }

    public function getShow($id){

      $cliente = Cliente::findOrFail($id);

      return view('catalog/show', array('cliente'=>$cliente));
    }

    public function getCreate(){

      return view('catalog/create');
    }

    public function getEdit($id){

      $cliente = Cliente::findOrFail($id);
      return view('catalog/edit', array('cliente'=>$cliente));
    }

    public function postCreate(Request $request){
      $c = new Cliente;
      $c->nombre = $request->input('title');

      if ($request->hasFile('file')) {

        //obtenemos el campo file definido en el formulario
         $fichero = $request->file('file');
         $c->imagen = $fichero->getClientOriginalName();
         $fichero->storeAs('img',$c->imagen);
      }
        $c->fecha_nacimiento = $request->input('fecha_nacimiento');
        $c->correo = $request->input('email');
        $c->save();

        return redirect('/catalog');
    }

    public function putEdit(Request $request, $id){
      $c = Cliente::findOrFail($id);
      //$c = new Cliente;
      $c->nombre = $request->input('title');

      if ($request->hasFile('file')) {

        //obtenemos el campo file definido en el formulario
         $fichero = $request->file('file');
         $c->imagen = $fichero->getClientOriginalName();
         $fichero->storeAs('img',$c->imagen);
      }
        $c->fecha_nacimiento = $request->input('fecha_nacimiento');
        $c->correo = $request->input('email');
        $c->save();

        return redirect('/catalog');
    }

    public function putDelete($id){

      $cliente = Cliente::find($id);
      $img = $cliente["imagen"];
      Storage::delete('img/'.$img);
      $cliente->delete();

      return redirect('/catalog');
    }

    public function enviaCorreo(){

      $cliente = Cliente::All();

      $hoy = date("Y-m-d");
      echo $hoy;
      foreach ($cliente as $c) {

        if($hoy == $c->fecha_nacimiento){

          $mail = new MailController();
          $data = $c;
          $mail->attachment_email($data);
        }
      }
  //    $mail = new MailController();
      //$mail->attachment_email();
    }
}
