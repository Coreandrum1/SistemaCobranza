@extends('layouts.account')

@section('content')
    <h1 class="m-5">Registrar usuario</h1>
    {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name_lbl', 'Nombre')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nombre(s)'],['aria-describedby'=>'emailHelp'],['required'])}}
    </div>
    <div class="form-group">
        {{Form::label('lastname_lbl', 'Apellido')}}
        {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Apellido(s)'])}}
    </div>
    <div class="form-group">
        {{Form::label('phone_lbl', 'Número telefónico')}}
        {{Form::number('phone', '', ['class' => 'form-control', 'placeholder' => 'Teléfono', 'max' => '9999999999'])}}
    </div>
    <div class="form-group">
        {{Form::label('phone_lbl', 'Correo electrónico')}}
        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.ej'])}}
    </div>
    <div class="form-group">
        {{Form::label('pass_lbl', 'Contraseña')}}
        {{Form::password('password',['class' => 'form-control', 'placeholder' => 'Contraseña'])}}
    </div>

    {{Form::submit('Registrar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection