@extends('base')

@section('content')
    <form action="{{ route('car.update') }}" method="post">
        @csrf

        <input type="hidden" name="car_id" value="{{ $car->id }}">

        <div>
            <label for="license_plate">Kentekenplaat</label>
            <input type="text" id="license_plate" name="license_plate" value="{{ $car->license_plate }}" required>
        </div>

        <div>
            <label for="price">Prijs</label>
            <input type="number" id="price" name="price" value="{{ $car->price }}" step="0.01" required>
        </div>

        <button type="submit">Edit</button>
    </form>


    <form action="{{ route('car.sold') }}" method="post">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        <button type="submit">Verkocht</button>
    </form>

    <form action="{{ route('car.delete') }}" method="post">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        <button type="submit">Verwijderen</button>
    </form>
@endsection
