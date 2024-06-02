@extends('base')
    toastr()->success('This car has been viewed: ', $car->views, 'since creation!');
@php

@endphp

@section('content')
    <h1>{{ $car->license_plate }} &euro;{{ $car->price }}</h1>
    <p>Verkoper: {{ $car->user->name }}</p>
    <br>
    <p>Merk/Model: {{ $car->brand }} - {{ $car->model}}</p>
    <p>K/m stand: {{ $car->mileage }}</p>
    <p>Stoelen/Deuren: {{ $car->seats }} {{ $car->doors}}</p>
    <p>Productie jaar: {{ $car->production_year }}</p>
    <p>Gewicht: {{ $car->weight }}</p>
    <p>Kleur: {{ $car->color }}</p>
@endsection
