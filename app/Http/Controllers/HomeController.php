<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class HomeController extends Controller
{

    public function index()
    {
        $images = Image::all();
        // dd($images);
        return view('home' , compact('images'));
    }
}
