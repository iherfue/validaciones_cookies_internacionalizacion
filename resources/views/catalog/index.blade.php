@extends('layouts.master')

@section('content')

@if(Auth::user()->hasRole('admin'))
    <div>Acceso como administrador</div>

@else
    <div>Hola {{Auth::user()->name}} Rol: Usuario</div>

@endif
You are logged in!

<div class="row">

@foreach( $clientes as $cliente )
<div class="col-xs-6 col-sm-4 col-md-3 text-center">

    <a href="{{ url('/catalog/show/' . $cliente->id ) }}">
        <img src="/img/{{$cliente->imagen}}" style="height:200px"/>
        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$cliente->nombre}}
        </h4>
    </a>

</div>

@endforeach
</div>
<a href="/correo"><button class="btn btn-success">Comprueba</button></a>
@stop
