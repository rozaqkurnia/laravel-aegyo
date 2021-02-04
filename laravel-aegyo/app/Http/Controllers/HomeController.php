<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories     = \App\Models\Category::orderBy('id')->get();
        $articles       = \App\Models\Article::orderBy('id')->get();
        return view( 'home', [
            'meta'          => [
                'page-title'    => '',
                'nav-link'      => $categories 
            ],
            'articles'      => $articles
        ]);
    }

    public function getArticleByCat($catId)
    {
        $categories = \App\Models\Category::orderBy('id')->get();
        $category   = \App\Models\Category::find($catId);
        $articles   = \App\Models\Article::where('category_id', $catId)->get();
        return view( 'home', [
            'meta'          => [
                'page-title'    => $category->name,
                'nav-link'      => $categories 
            ],
            'articles'  => $articles
        ]);
    }

    public function getArticle($id)
    {
        $article = \App\Models\Article::find($id);
        $categories = \App\Models\Category::orderBy('id')->get();
        //dd($article->title);
        return view( 'article.single', [
            'meta'          => [
                'page-title'    => $article->title,
                'nav-link'      => $categories 
            ],
            'article'  => $article
        ]);
    }
}
