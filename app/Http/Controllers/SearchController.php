<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $posts = Post::where('title', 'LIKE', '%' . $q . '%')
        ->orWhere('content', 'LIKE', '%' . $q . '%')
        ->published()
        ->paginate(6);

        $posts->appends(['q' => $q]);
        return view('pages.posts', compact('posts'));
    }
}
