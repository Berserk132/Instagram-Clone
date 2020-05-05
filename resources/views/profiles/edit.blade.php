@extends('layouts.app')

@section('content')
    <div class="container ">

        <div class="row">
            <h1>Edit Profile</h1>
        </div>

        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="title">Profile Title</label>
                <input value="{{ $user->profile->title }}" type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
                @if ($errors->has('title'))
                    <div class="alert-danger">
                        <strong>{{ old('title') ?? $profile->title }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group row">
                <label for="description">Profile Description</label>
                <input value="{{ $profile->description }}" type="text" class="form-control-file" id="description" name="description">
                @if ($errors->has('description'))
                    <div class="alert-danger">
                        <strong> {{$errors->first('description')}}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group row">
                <label for="url">Profile URL</label>
                <input value="{{ $profile->url }}" type="text" class="form-control-file" id="url" name="url">
                @if ($errors->has('url'))
                    <div class="alert-danger">
                        <strong> {{$errors->first('url')}}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group row">
                <label for="image">Post Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($errors->has('image'))
                    <div class="alert-danger">
                        <strong> {{$errors->first('image')}}</strong>
                    </div>
                @endif
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">Add New Post</button>
            </div>
        </form>

    </div>
@endsection
