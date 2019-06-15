@extends('layouts.debtor')

@section('content')

    @if(count($charges) > 0)
        <h1 class="m-5">Tus cobros</h1>
        @foreach ($charges as $charge)

            <div class="card card-body bg-light m-3">
                <h5>ID de cobro: {{$charge->id_charge}}</h5>
                <h3>Monto: $ {{number_format($charge->amount)}} MXN</h3>
                <h5>Realizado: {{$charge->created_at}}</h5>
                @if(count($payments) > 0)
                    @foreach ($payments as $payment)

                        @if($payment->id_charge == $charge->id_charge)
                            <div class="card card-body bg-light m-3">
                                <h5>ID de pago: {{$payment->id}}</h5>
                                <h3>Monto: $ {{number_format($payment->amount)}} MXN</h3>
                                <h5>Realizado: {{$payment->created_at}}</h5>
                            </div>
                        @else
                            <p>sin pagos</p>
                        @endif

                    @endforeach
                @else
                    <p>Sin cobros</p>
                @endif
            </div>

        @endforeach
    @else
        <p>Sin cobros</p>
    @endif
@endsection