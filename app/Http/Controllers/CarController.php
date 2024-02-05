<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function formcreate(){
        return view('forms/createcar');
    }

    public function store(Request $request){
        $request->validate([
            'license_plate' => 'required|string',
            'price' => 'required|integer',
        ]);
    }

    public function index(){
        
    }
}
