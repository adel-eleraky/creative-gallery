<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class DashboardController extends Controller
{
    public function index()
    {

        $imagesNum = Image::where('user_id', auth()->user()->id)->get()->count();
        return view('dashboard.index' , compact('imagesNum'));
    }
}
