@extends('base')

@section('content')
    <p>Home</p>

    @foreach ($cars as $car)
        <a href="{{ route('car.read', $car->id)}}">{{ $car->license_plate }} | &euro;{{ $car->price }}</a>
    @endforeach

    <p>My cars</p>
    @if (isset($mycars))
        @foreach ($mycars as $car)
            @if ($car->sold_at == null)
                <h3><a href="{{ route('car.edit', ['id' => $car->id]) }}">{{ $car->license_plate }} |
                        &euro;{{ $car->price }}</a>[For Sale]</h3>
            @else
                <h3><a href="{{ route('car.edit', ['id' => $car->id]) }}">{{ $car->license_plate }} |
                        &euro;{{ $car->price }}</a>[Sold]</h3>
            @endif
        @endforeach
    @endif
@endsection
