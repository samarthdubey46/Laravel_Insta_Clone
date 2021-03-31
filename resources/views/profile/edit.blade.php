@extends('layouts.app')

@section('content')
    <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                <div class="col-md-6">
                    <input id="title" class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ old('title') ?? $user->profile->title }}" autocomplete="title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                <div class="col-md-6">
                    <input id="description" class="form-control @error('description') is-invalid @enderror"
                           name="description"
                           value="{{ old('description') ?? $user->profile->description }}" autocomplete="description">

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                <div class="col-md-6">
                    <input id="url" class="form-control @error('url') is-invalid @enderror"
                           name="url"
                           value="{{ old('url') ?? $user->profile->url  }}" autocomplete="url">

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <label for="image" class="col-md-4 col-form-label text-md-right">Profile Picture</label>

                <div class="col-md-6">
                    <input id="image" class="pt-1"
                           name="image"
                           type="file"
                    >

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0 pt-2">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
