<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){



        return view('posts.create');
    }

    public function store(){


        $data = request()->validate([

            'caption' => 'required',
            'image' => ['required','image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');


        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        // get the authenticated user
        auth()->user()->posts()->create([
            'caption' => request('caption'),
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->User()->id);

    }

    public function show(\App\Post $post){

        //dd($post);
        return view("posts.show")->with(
            ['post' => $post]
        );
    }
}
