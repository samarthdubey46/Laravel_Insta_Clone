<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $user_ids = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id',$user_ids)->with('user')->latest()->paginate(5);
        return view('post.index',compact('posts'));
    }

    function create()
    {
        return view('post.create');
    }


    function store()
    {
        $data = request()->validate([
            'caption' => ['required'],
            'image' => ['required', 'image']
        ]);
        $imagePath = 'storage/' . request('image')->store('uploads', 'public');
        $image = Image::make(public_path($imagePath))->fit(640, 640);
        $image->save();
        $data['image'] = $imagePath;
        auth()->user()->posts()->create($data);
        return redirect('profile/' . auth()->user()->id);
    }

    function show(Post $post)
    {
//        dd($post);
        return view('post.show', compact('post'));
    }
}
