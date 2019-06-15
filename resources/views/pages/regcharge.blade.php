@extends('layouts.account')

@section('content')
    <h1 class="m-5">Registrar cobro</h1>
    {!! Form::open(['action' => 'ChargesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name_lbl', 'Nombre')}}
        {{Form::select('debtor', $items,'hola',['class' => 'form-control'])}}
    </div>
    

    <div class="form-group">
        <div class="dropdpwn">
                {{Form::label('amoutn_lbl', 'Monto1')}}
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            {{Form::number('amount', '@', ['class' => 'form-control', 'placeholder' => 'Monto(pesos)', 'aria-describedby'=>'basic-addon1'])}}
        </div>
        
    </div>
    {{Form::submit('Registrar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection