<?php

namespace App\Http\Controllers;

use App\Models\General; //Delete this line if you are using Voyager
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke($slug)
    {
        //get the general information about the website
        $website = General::query()->firstOrFail();

        //get the requested category
        $category = Category::query()
            ->where('slug', $slug)
            ->firstOrFail();

        //get the posts in that category
        $posts = $category->posts()
            ->where('is_published',true)
            ->orderBy('id','desc')
            ->get();

        //get all the categories
        $categories = Category::all();

        //get all the tags
        $tags = Tag::all();

        //get the recent 5 posts
        $recent_posts = Post::query()
            ->where('is_published',true)
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        //return the data to the corresponding view
        return view('category', [
            'website' => $website,
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'recent_posts' => $recent_posts
        ]);
    }
}
