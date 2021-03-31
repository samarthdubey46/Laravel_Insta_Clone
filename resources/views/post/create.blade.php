@extends('layouts.app')

@section('content')
    <form action="/p" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>

                <div class="col-md-6">
                    <input id="caption" class="form-control @error('caption') is-invalid @enderror"
                           name="caption"
                           value="{{ old('caption') }}" autocomplete="caption">

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

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
                        Add New Post
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
