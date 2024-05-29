<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $images = Image::where('user_id', auth()->user()->id)->get();
        return view('dashboard.images.index' , compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // Validate the form inputs
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:wedding,ai,nature,graphic',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate a unique name for the images
        $imageName = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();

        // Save the images in the public folder based on the type of image
        $type = $request->input('type');
        $request->image->storeAs('images/' . $type, $imageName, 'public');


        // Store the validated data in the database
        $image = new Image();
        $image->title = $request->input('title');
        $image->image = $imageName;
        $image->price = $request->input('price');
        $image->user_id = auth()->user()->id;
        $image->type = $request->input('type');
        $image->save();

        // Redirect back with success message
        return redirect("/images")->with('success', 'Image created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $image = Image::find($id);

        $image->delete();
        return redirect('/images')->with('success', 'Image deleted successfully.');
    }
}
