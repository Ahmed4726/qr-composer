<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // dd($request);
        // Validate the request data
        // $request->validate([
        //     'photo' => 'image|mimes:jpeg,png|max:800', // Adjust file types and size as needed
        //     'firstName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        // ]);

        // Handle photo upload
        $logoPath = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->getClientOriginalName();
            $logoPath = $request->file('photo')->move(public_path('images'), $filename);
            $logoPath = "images/{$filename}";
        }

        // Update user details
        $user = $request->user();
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

            if ($logoPath !== null) {
                $user->photo = $logoPath;
            }

        // Reset email verification if email is updated
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Redirect with a status message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // dd('ok');
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        $user = $request->user();

        Auth::logout();

        $user->status = 0;
        $user->save();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
