@extends('layouts.account')

@section('content')
    <h1 class="m-5">Historial de pagos</h1>
    @if(count($payments) > 0)
    @foreach ($payments as $payment)

        <div class="card card-body bg-light m-3">
            <h5>ID de pago: {{$payment->id}}</h5>
            <h3>Monto: $ {{number_format($payment->amount)}} MXN</h3>
            <h5>Deudor: {{$payment->name}} {{$payment->lastname}}</h5>
            <h5>Realizado: {{$payment->created_at}}</h5>
        </div>

    @endforeach
    @else
        <p>Sin cobros</p>
    @endif

@endsection