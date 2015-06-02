<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use App\Article;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller {

    public function __construct()
    {

        $this->middleware('auth', ['only' => 'create']);

    }

	public function index()
    {

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));

    }

    public function show(Article $article)
    {


        return view('articles.show', compact('article'));

    }


    public function create()
    {

        return view('articles.create');

    }

    public function store(ArticleRequest $request)
    {

        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

        \Session::flash('flash_message', 'Your article has been created!');

        return redirect('articles');

    }

    public function edit(Article $article)
    {

        return view('articles.edit', compact('article'));

    }

    public function update(Article $article, ArticleRequest $request)
    {


        $article->update($request->all());

        \Session::flash('flash_message', 'Your article has been updated!');

        return redirect('articles');

    }
}
