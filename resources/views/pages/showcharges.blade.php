@extends('layouts.account')

@section('content')
    <h1 class="m-5">Mis deudores</h1>

    @if(count($charges) > 0)
   
        @foreach ($charges as $charge) 
            <div class="card card-body bg-light m-3">
                <h5>ID de deudor: {{$charge->id}}</h5>
                <h3>{{$charge->name}} {{$charge->lastname}}</h3>
                @foreach($payed as $pay)
                    @if($pay->name == $charge->name)
                    <div class="card bg-light p-3 m-2">
                        <h3>$ {{number_format($pay->amount)}}</h3>
                        <p>{{$pay->created_at}}</p>
                        <p>Acumulado: $ {{number_format($acc += $pay->amount)}}</p>
                    </div>
                    @else

                    @endif
            @endforeach
            
            <p class="text-success">Monto de cobro $ {{number_format($charge->amount)}}</p>
            <p class="text-danger">Total a restar -$ {{number_format($acc)}}</p>
            <p class="text-success">Pendiente $ {{number_format($charge->amount - $acc)}}</p>
            <p style="display: none;">{{$acc = 0}} pagos</p>
            </div>
        @endforeach
    @else
        <h5>No tienes deudores en este cobro</h5>
    @endif

@endsection