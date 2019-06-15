@extends('layouts.account')

@section('content')
    <h1 class="m-5">Registrar pago</h1>
    {!! Form::open(['action' => 'PaymentController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('payment_lbl', 'Deudor')}}
        {{Form::select('user', $items,'null', ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('charge_lbl', 'Cobro')}}
        {{Form::select('charge', $ch,'null', ['class' => 'form-control'])}}
    </div>



    <div class="form-group">
        {{Form::label('amoutn_lbl', 'Monto a pagar')}}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">$</span>
            </div>
            {{Form::number('amount', '', ['class' => 'form-control', 'placeholder' => 'Monto(pesos)'])}}
        </div>
    </div>
    {{Form::submit('Registrar pago', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection