@extends('layouts.master')

@section('content')

<div class="row">

<div class="col-sm-3">
  <img src='{{ $cliente['imagen'] }}'>
</div>
<div class="col-sm-4">
    <strong><h1>{{$cliente->nombre}}</h1></strong>
    <strong>Correo-e: </strong>{{$cliente->correo}}<br/>
    <strong>Fecha de nacimiento:</strong>{{$cliente->fecha_nacimiento}}<br/>
    <a href="{{ url('/catalog/edit/'. $cliente->id) }}"><button type="button" class="btn btn-warning">Editar</button>
    <a href="{{ url('/catalog/') }}"><button type="button" class="btn btn-info">Volver</button></a>
</div>
</div>

@stop
