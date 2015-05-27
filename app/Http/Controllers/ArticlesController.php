<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller {

	public function index()
    {

        $articles = Article::all();
        //How do I automatically import the App\Article class?

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {

        $article = Article::findOrFail($id);


        return view('articles.show', compact('article'));
    }
}
