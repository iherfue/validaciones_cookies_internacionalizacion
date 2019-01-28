@extends('layouts.master')

@section('content')
<?php
  $originalDate = $cliente ->fecha_nacimiento;
  $newDate = date("d/m/Y", strtotime($originalDate));
?>
<div class="row" style="margin-top:40px">
<div class="offset-md-3 col-md-6">
  <div class="card">
     <div class="card-header text-center">
        Modificar cliente
     </div>
     <div class="card-body" style="padding:30px">

        <form method="POST">
          {{ method_field('PUT')}}
          @csrf
        <div class="form-group">
           <label for="title">Nombre</label>
           <input type="text" name="title" id="title" class="form-control" value="{{$cliente->nombre}}">
        </div>

        <div class="form-group">
          <label for="url">Url de la imágen</label>
           <input type="url" name="url" class="form-control" value="{{$cliente->imagen}}">
        </div>

        <div class="form-group">
          <label for="url">Fecha Nacimiento</label>
          <input type="text" name="fecha_nacimiento" class="form-control" value="<?php echo $newDate?>">
        </div>

        <div class="form-group">
            <label for="url">Email</label>
           <input type="email" name="email" class="form-control" value="{{$cliente->correo}}">
        </div>

        <div class="form-group text-center">
           <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
              Modificar
           </button>
        </div>
      </form>
     </div>
  </div>
</div>
</div>

@stop
