@extends('layouts.account')

@section('content')
    <h1 class="m-5">Mis deudores</h1>

    @if(count($charges) > 0)
   
        @foreach ($charges as $charge) 

            @foreach ($charge->user as $user) 

                <div class="card card-body bg-light m-3">
                    <h5>ID de deudor: {{$user->id}}</h5>
                    <h3>{{$user->name}} {{$user->lastname}}</h3>
                </div>

            @endforeach
        @endforeach
    @else
        <h5>No tienes deudores en este cobro</h5>
    @endif

@endsection