@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="w-100 h-100" src="/storage/{{$post->image}}"/>
            </div>
            <div class="col-6 ">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="mr-3">
                        <img style="max-width: 75px" class="rounded-circle w-100 h-100" src="/storage/{{$post->user->profile->image}}"/>
                    </div>
                    <div class="font-weight-bold pr-1">
                        <a style="text-decoration: none" href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </div>
                    <h2 style="font-weight: bolder">.</h2>
                    <a class="pl-1" href="#">Follow</a>
                </div>

                <hr>

            </div>
        </div>
    </div>
@endsection
