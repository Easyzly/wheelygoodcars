@extends('base')

@section('content')
    <form action="{{ route('car.store') }}" method="post">
        <input type="text" name="license_plate" id="license_plate" placeholder="kenteken">
        <input type="number" name="price" id="price">
        <input type="submit" value="verkopen">
    </form>
@endsection
