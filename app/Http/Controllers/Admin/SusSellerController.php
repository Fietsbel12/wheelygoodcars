<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SusSellerController extends Controller
{
    public function index(){
        $susSellers = User::with('cars.tags')->get()->filter->sus();

        return view('admin.sus-sellers.index', compact('susSellers'));
    }
}
