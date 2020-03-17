<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'postpic' => ['required', 'image'],
        ]);

        $user = Auth::user();
        $profile = new Post();
        $imagePath = request('postpic')->store('uploads', 'public');
        
        $profile->user_id = $user->id;
        $profile->caption = request('caption');
        $profile->image = $imagePath;
        $saved = $profile->save();

        if($saved){
            return redirect('/profile');
        }
    }

    public function show($postID){
        $post = Post::where('id', $postID)->first();
        $user = Auth::user();
        
        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
}
