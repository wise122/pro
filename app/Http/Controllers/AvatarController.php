<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the user and update the photo
        $user = auth()->user();
        $avatarPath = $request->file('avatar')->store('avatars', 'public');

        // Save the new photo path to the user model
        $user->avatar = $avatarPath;
        $user->save();

        return redirect()->back()->with('success', 'Avatar updated successfully');
    }
}
