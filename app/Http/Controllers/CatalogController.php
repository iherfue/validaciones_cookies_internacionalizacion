<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
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
}
