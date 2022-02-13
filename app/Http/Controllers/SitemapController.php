<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(){
        $post = Post::where('hide', '!=', false)
            ->orderBy('updated_at', 'desc')
            ->first() ?? [];

        return response()->view('sitemap.index', [
            'post' => $post
        ])->header('Content-Type', 'text/xml');
    }

    public function posts(){
        $posts = Post::where('hide', '!=', false)
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->view('sitemap.posts', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}
