<?php

namespace App\Http\Controllers;

use App\Models\General; //Delete this line if you are using Voyager
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        //get the general information about the website
        $website = General::query()->firstOrFail();

        //get the requested post, if its published
        $post = Post::query()
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        //get all the categories
        $categories = Category::all();

        //get all the tags
        $tags = Tag::all();

        //get the recent 5 posts
        $recent_posts = Post::query()
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        //return the data to the corresponding view
        return view('post', [
            'website' => $website,
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts,
        ]);
    }

    public function search(Request $request)
    {
        //get the general information about the website
        $website = General::query()->firstOrFail();

        $key = trim($request->get('q'));

        $posts = Post::query()
            // laravel will find the title that is similar to the search
            ->where('title', 'like', "%{$key}%")
            ->orWhere('content', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        //get all the categories
        $categories = Category::all();

        //get all the tags
        $tags = Tag::all();

        //get the recent 5 posts
        $recent_posts = Post::query()
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('search', [
            'website' => $website,
            'key' => $key,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ]);
    }
}
