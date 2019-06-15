@extends('layouts.account')

@section('content')
    <h1 class="m-5">Mis cobros</h1>
     @if(count($data) > 0)
        @foreach ($data as $dat)

            <div class="card card-body bg-light m-3">
                <h5>ID de cobro: {{$dat->id}}</h5>
                <h3>Monto: $ {{number_format($dat->amount)}} MXN</h3>
                <h5>Realizado: {{$dat->created_at}}</h5>
                <a href="/owner/{{$dat->id}}">Ver deudores...</a>
            </div>

        @endforeach
    @else
        <p>Sin cobros</p>
    @endif

    
   
@endsection