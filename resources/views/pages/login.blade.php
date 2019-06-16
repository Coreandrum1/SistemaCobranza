@extends('layouts.sesion')

@section('content')
    <h1 class="m-3">Iniciar sesión</h1>
    <!-- Form that will ake credentials data on submit -->
    {!! Form::open(['action' => 'LoginController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('phone_lbl', 'Teléfono')}}
        {{Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'Número telefónico'])}}
    </div>
    <div class="form-group">
        {{Form::label('pass_lbl', 'Contraseña')}}
        {{Form::password('password',['class' => 'form-control', 'placeholder' => 'Contraseña'])}}
    </div>
    
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    <!-- submit will call store() function on LoginController -->
    {!! Form::close() !!}

@endsection
