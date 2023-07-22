<?php

namespace App\Http\Controllers;

use App\Domain\Request\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('auth.profile', compact('user'));
    }

    public function store(ProfileRequest $request)
    {
        $user = auth()->user();
        $user->fill($request->persist())->save();
        session()->flash('success', 'Profile updated successfully!.');

        return back();
    }
}
