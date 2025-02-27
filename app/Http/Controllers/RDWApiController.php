<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RDWApiController extends Controller
{
    public function getData()
    {
        $url = 'https://opendata.rdw.nl/resource/m9d7-ebf2.json?';

        $response = Http::get($url);

        if ($response->successful()){
            $data = $response->json();
            return response()->json($data);
        } else {
            return response()->json(['error' => 'API aanroep werkt niet'], 500);
        }
    }
}
