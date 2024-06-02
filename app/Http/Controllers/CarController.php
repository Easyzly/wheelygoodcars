<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Car;

class CarController extends Controller
{
    public function formcreate(){
        return view('forms/createcar');
    }

    public function store(Request $request)
    {
        $url = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=' . $request->get('license_plate');
        $response = Http::get($url);
        if($response){
            $car = $response->json();

            $brand = $car[0]['merk'];
            $model = $car[0]['handelsbenaming'];
            $color = $car[0]['eerste_kleur'];
            $seats =$car[0]['aantal_zitplaatsen'];
            $doors = $car[0]['aantal_deuren'];
            $build_year = $car[0]['datum_tenaamstelling'];
            $weight = $car[0]['massa_ledig_voertuig'];

            $car = Car::create([
                'user_id' => $request->get('user_id'),
                'license_plate' => $request->get('license_plate'),
                'price' => $request->get('price'),
                'brand' => $brand,
                'model' => $model,
                'color' => $color,
                'seats' => $seats,
                'production_year' => $build_year,
                'doors' => $doors,
                'weight' => $weight,
            ]);
        }
        return redirect()->route('home');
    }

    public function find(string $kenteken){
        $url = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=' . $kenteken;
        $response = Http::get($url);
        $car = $response->json();

        if($car){
            return view('cars/find', compact('car'));
        }else{
            echo('Geen auto gevonden!');
        }
    }

    public function read(int $id){
        $car = Car::find($id);
        if(!$car){
            return redirect()->back();
        }

        $car->update([
            'views' => ($car->views + 1)
        ]);
        return view('cars.read', compact('car'));
    }

    public function index(){
        $cars = Car::whereNull('sold_at')->get();
        if(auth()->user()){
            $mycars = Car::where('user_id', auth()->user()->id)->get();
            return view('home', compact('cars', 'mycars'));
        }else{
            return view('home', compact('cars'));
        }
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('forms/editcar', compact('car'));
    }

    public function update(Request $request)
    {
        $car = Car::find($request->input('car_id'));
        $car->license_plate = $request->input('license_plate');
        $car->price = $request->input('price');
        $car->save();

        return redirect()->route('car.edit', ['id' => $car->id])->with('success', 'Car updated successfully!');
    }

    public function sold(Request $request){
        $car = Car::find($request->input('car_id'));
        $car->sold_at = date('Y-m-d H:i:s');
        $car->save();

        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        $car = Car::find($request->input('car_id'));
        $car->delete();

        return redirect()->route('home')->with('success', 'Car deleted successfully!');
    }
}
