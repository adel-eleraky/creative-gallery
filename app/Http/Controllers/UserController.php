<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function create() {

        $user = auth()->user();
        return view('dashboard.profile.index' , compact('user'));
    }

    public function editProfile(Request $request) {

        // dd($request->all());
        // Validate the form inputs
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve the authenticated user
        $user = auth()->user();

        // Update the user's name and email
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }

    public function editPassword(Request $request) {

        // dd($request->all());
        // Validate the form inputs
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                }
            ],
            'new_password' => 'required|string|max:255',
            'confirm_new_pass' => [
                'required',
                'string',
                'max:255',
                'same:new_password',
            ],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve the authenticated user
        $user = auth()->user();

        // Update the user's name and email
        $user->password = bcrypt($request->input("new_password"));
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password updated successfully!');
    }
}
