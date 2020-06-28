<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __cconstruct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        //dump($request->file('profile_picture'));
        //dd($request->profile_picture);
        $picture = $request->profile_picture;
        $picture->move(public_path('upload'), $fileName = 'profile-picture.jpg');

        $profileData = $request->validated();
        $profileData['profile_picture'] = $fileName;

        $request->user()->update($profileData);

        return back()->with('message', "Profile has been updated successfully.");
    }
}
