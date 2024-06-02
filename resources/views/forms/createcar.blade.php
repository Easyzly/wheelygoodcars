@extends('base')

@section('content')
    <form action="{{ route('car.store') }}" method="post">
        @csrf

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div>
            <label for="license_plate">Kentekenplaat</label>
            <input type="text" id="license_plate" name="license_plate" value="{{ old('license_plate') }}" required>
        </div>

        <div>
            <label for="price">Prijs</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
