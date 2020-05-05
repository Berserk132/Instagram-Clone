@extends('layouts.app')

@section('content')
    <div class="container ">

            <div class="row">
                <h1>Add New Post</h1>
            </div>

            <form action="/p" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label for="caption">Post Caption</label>
                    <input type="text" class="form-control" name="caption" id="caption" aria-describedby="emailHelp">
                    @if ($errors->has('caption'))
                        <div class="alert-danger">
                            <strong>{{ $errors->first('caption') }}</strong>
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
