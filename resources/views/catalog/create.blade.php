@extends('layouts.master')

@section('content')

    <?php
        print_r(\Request::cookie('idioma'));
        \App::SetLocale(\Request::cookie('idioma'));
    ?>

<div class="row" style="margin-top:40px">
  <form action="{{url('/language')}}" method ="post">

    <input type="submit" name="idioma" value="en">
    <input type="submit" name="idioma" value="es">
  </form>
<div class="offset-md-3 col-md-6">
  <div class="card">
     <div class="card-header text-center">
        {{__('Add Client')}}
     </div>
     <div class="card-body" style="padding:30px">

        <form method="POST" action="{{url('catalog/create')}}" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
           <label for="title">{{__('Name')}}</label>
           <input type="text" name="title" id="title" class="form-control" value="{{ old('title' )}}">
           {!!$errors->first('title', '<small>:message</small><br>')!!}
        </div>

        <div class="form-group">
          <label for="url">{{__('Image')}}</label>
           <input type="file" name="file" class="form-control">

        </div>

        <div class="form-group">
          <label for="url">{{__('Birth Date')}}</label>
          <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento' )}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="url">Email</label>
           <input type="text" name="email" class="form-control" value="{{ old('email' )}}">
           {!! $errors->first('email', '<small>:message</small><br>')!!}
        </div>

        <div class="form-group text-center">
           <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
               {{__('Add Client')}}
           </button>
        </div>
      </form>
     </div>
  </div>
</div>
</div>

@stop
