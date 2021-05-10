<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TagController extends Controller
{
    public function index($slug)
    {
        $posts = Post::whereHas('tags', function ($query) use ($slug) {
            $query->whereSlug($slug);
        })->paginate(6);
        return view('pages.posts', compact('posts'));
    }
}
