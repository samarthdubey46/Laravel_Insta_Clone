<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

function CacheRemember($name, $seconds_add, $return_val)
{
    return Cache::remember($name, now()->addSeconds($seconds_add),function () use ($return_val){
        return $return_val;
    } );
}


class ProfilesController extends Controller
{

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = CacheRemember('profile.post.' . $user->id, 30, $user->posts->count());
        $followersCount = CacheRemember('profile.followers.' . $user->id, 30, $user->profile->followers->count());
        $followingCount = CacheRemember('profile.following.' . $user->id, 30, $user->following->count());;
        return view('profile.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => ['required'],
            'description' => ['required',],
            'url' => 'url',
            'image' => '',
        ]);
        if (\request('image')) {
            $imagePath = 'storage/' . request('image')->store('profile', 'public');
            $image = Image::make(public_path($imagePath))->fit(600, 600);
            $image->save();
            $data['image'] = $imagePath;
        }

        auth()->user()->profile()->update($data);
        return redirect('profile/' . auth()->user()->id);

    }
}
