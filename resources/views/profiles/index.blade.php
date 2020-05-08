@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-2 col-md-4 col-lg-3">
            <img class="rounded-circle" style="max-width: 10rem" alt="" src="{{ $user->profile->getImage() }}"/>
        </div>
        <div class="col-xl-10 col-md-9 col-lg-9">
            <div class="d-flex  justify-content-between align-items-baseline">
                <h1 class="pr-5">{{ $user->username }}</h1>
                @can('update', $user->profile)
                    <a style="color: #000;text-decoration: none" href="{{url('/p/create')}}"><button class="btn btn-outline-primary">Add New Post</button></a>
                @endcan
            </div>
                <follow-button user-id = {{$user->id}}></follow-button>
            <div>
                @can('update', $user->profile)

                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>247</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a> </div>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-lg-4 col-sm-12 mb-5">
                <a href="{{url('/p/' . $post->id)}}">

                    <img style="width: 100%;height: 100%;" alt="" src="{{asset('storage/' . $post->image)}}">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
