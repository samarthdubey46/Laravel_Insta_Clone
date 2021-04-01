@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center pt-2">
        @foreach($profiles as $profile)
            <div class="col-12  ">
                <div class="d-flex align-items-center">
                    <a href="/profile/{{$profile->user->id}}">
                        <img src="/{{$profile->image}}" class="rounded-circle " style="width: 150px" alt="">
                    </a>
                    <a href="/profile/{{$profile->user->id}}">
                        <p class="pl-3 text-dark" style="font-size: 22px">{{$profile->user->username}}</p>
                    </a>
                </div>
                <hr/>
            </div>
        @endforeach
        <div class="row">
            <div class="col-8 d-flex justify-content-center">
                {{ $profiles->links() }}
            </div>
        </div>
    </div>
@endsection
