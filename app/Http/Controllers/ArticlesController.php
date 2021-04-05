<?php

namespace App\Http\Controllers;
// imports article model so all database stuff is entered.
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        // using 'index' is used when showing a list of something

        // gets all articles in desending order
        $articles = Article::latest()->get();

        // articles.'something' means its nested in a directory. it then shows the article we want.
        return view('articles.index', ['articles' => $articles]);
    }

    // This has to be the same name as it is in the web.php
    public function show(Article $article)
    {
        // using show when we want to show one specific thing

        // articles.'something' means its nested in a directory. it then shows the article we want.
        return view('articles.show', ['article' => $article]);
        // Article ::where('id', 1)->first();     -    Another way to write this
    }

    public function create()
    {
        // shows a view to create a new resource
        return view('articles.create');

    }

    public function store()
    {
        // saves the new resource

        // create method assigns the attributes and saves to the database all at once
        Article::create($this->validateArticle());

        // sends the user back to the /articles page after submitting
        return redirect('/articles');

    }

    public function edit(Article $article)
    {
        // shows a view to edit an existing resource

        // passes the article to the view
        return view('articles.edit', compact('article'));
        //return view('articles.edit', ['article => $article']);
    }

    // this is ran once the submit button is used in the uodate page
    public function update(Article $article)
    {
        // saves the edited resource

        // update method assigns the attributes and saves to the database all at once
        Article::create($this->validateArticle());

        return redirect($article->path());
    }

    protected function validateArticle()
    {

        // makese sure the correct information is put in. If any inoformation fails, it will redirect to the previous page.
        //validates the request, the passses the validated atributes to the create method
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);


        // everything below can be written like above
        /*
        // makese sure the correct information is put in. If any inoformation fails, it will redirect to the previous page.
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body')
        ]);
        */
    }


    /*
    public function destroy()
    {
        // delete the resource
    }
    */
}
