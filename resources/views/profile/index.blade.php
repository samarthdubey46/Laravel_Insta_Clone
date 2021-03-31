@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img class="rounded-circle w-100 h-95"
                     src='/{{$user->profile->image}}'>

            </div>
            <div class="col-9  pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div>
                        <div class="d-flex align-items-center">
                            <h1>{{$user->username}}</h1>
                            <div user_id="{{$user->id}}" follows="{{$follows}}" id="follow_button"></div>
                        </div>
                        @can('update',$user->profile)
                            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                        @endcan
                    </div>
                    @can('update',$user->profile)
                        <a href="/p/create">Add New Post</a>
                    @endcan


                </div>
                <div class="row pt-2">
                    <div style="font-size: 18px" class="col-3"><strong>{{$postCount}}</strong> posts</div>
                    <div style="font-size: 18px" class="col-3"><strong>{{$followersCount}}</strong> followers</div>
                    <div style="font-size: 18px" class="col-3"><strong>{{$followingCount}}</strong> following</div>
                </div>

                <div class="pt-4 font-weight-bold" style="font-size: 17px">{{$user->profile->title}}</div>
                <div class="pt-1" style="font-size: 16px">{{$user->profile->description}}</div>
                <a href="https://www.freecodecamp.org/"
                   style="font-size: 17px;color: #1d68a7">{{$user->profile->url}}</a>
            </div>

            <div class="pt-5 row pl-5">
                @foreach($user->posts as $post)
                    <div class="col-4 pb-5">
                        <a href="/p/{{$post->id}}">
                            <img class="w-100" src={{'/' . $post->image}}>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
