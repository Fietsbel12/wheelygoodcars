<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function carViews(){
        $cars = Car::all();  // Haal alle auto's op, inclusief views

        return view('admin.car-views', compact('cars'));
    }
}
