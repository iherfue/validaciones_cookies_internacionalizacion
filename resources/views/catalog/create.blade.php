@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
<div class="offset-md-3 col-md-6">
  <div class="card">
     <div class="card-header text-center">
        Añadir cliente
     </div>
     <div class="card-body" style="padding:30px">

        <form method="POST">
          @csrf
        <div class="form-group">
           <label for="title">Nombre</label>
           <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
          <label for="url">Url de la imágen</label>
           <input type="url" name="url" class="form-control">
        </div>

        <div class="form-group">
          <label for="url">Fecha Nacimiento</label>
          <input type="date" name="fecha_nacimiento" class="form-control">
        </div>

        <div class="form-group">
            <label for="url">Email</label>
           <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group text-center">
           <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
               Añadir cliente
           </button>
        </div>
      </form>
     </div>
  </div>
</div>
</div>

@stop
