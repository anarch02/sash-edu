<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        // $data = $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email'],
        //     'password' => ['required']
        // ]);

        // auth()->user()->update($data);

        // return redirect()->back()->with('success', 'Profile updated');
    }
}
