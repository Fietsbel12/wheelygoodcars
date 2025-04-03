<?php

namespace App\Http\Controllers;
use App\Models\Tag;


use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::select('tags.*')
    ->withCount([
        'cars as sold_count' => function ($query) {
            $query->whereNotNull('sold_at');
        },
        'cars as not_sold_count' => function ($query) {
            $query->whereNull('sold_at');
        }
    ])
    ->get();

        return view('tags.index', compact('tags'));
    }

}
