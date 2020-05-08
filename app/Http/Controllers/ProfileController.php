<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(\App\User $user)
    {


        return view('profiles.index')->with('user', $user);
    }

    public function edit(User $id){

        $this->authorize('update', $id->profile);

        $profile = $id->profile;

        // compact making me send $user as user
        return view('profiles.edit')->with(['user'=> $id, 'profile'=> $profile]);
    }

    public function update(User $user){

        $data = \request()->validate([

            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if (\request('image')){

            $imagePath = \request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }



        $user->profile()->update(array_merge($data,

            $imageArray ?? []
            ));

        return redirect("/profile/{$user->id}");
    }
}
