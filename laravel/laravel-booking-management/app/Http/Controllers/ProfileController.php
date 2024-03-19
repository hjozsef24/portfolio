<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Auth::user()->profile;
        $editMode = false;
        return view('profile', compact('profile', 'editMode'));
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        $editMode = true;
        return view('profile', compact('profile', 'editMode'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());
        return redirect()->route('profile', $id)->with('success', 'Profile updated successfully');
    }
}
