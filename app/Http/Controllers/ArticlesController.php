<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use App\Article;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller {

    /**
     * Create a new articles controller instance.
     */
    public function __construct()
    {

        $this->middleware('auth', ['only' => 'create']);

    }

    /**
     * Direct to index and display articles.
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));

    }

    /**
     * Display an article.
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {

        return view('articles.show', compact('article'));

    }


    /**
     * Direct to create page.
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));

    }

    /**
     * Save a new article.
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        \Session::flash('flash_message', 'Your article has been created!');

        return redirect('articles');
    }

    /**
     * Direct to edit page.
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));

    }

    /**
     * Edit the article.
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {


        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        \Session::flash('flash_message', 'Your article has been updated!');

        return redirect('articles');

    }

    /**
     * Sync up the list of tags in the database.
     * @param Article $article
     * @param ArticleRequest $request
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article.
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {

        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;

    }
}
