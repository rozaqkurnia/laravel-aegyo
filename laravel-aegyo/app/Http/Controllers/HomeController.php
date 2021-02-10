<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
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
        $categories     = Category::orderBy('id')->get();
        $articles       = Article::orderBy('id')->get();
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
        $categories = Category::orderBy('id')->get();
        $category   = Category::find($catId);
        $articles   = Article::where('category_id', $catId)->get();
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
        $article = Article::find($id);
        $categories = Category::orderBy('id')->get();
        
        return view( 'article.single', [
            'meta'          => [
                'page-title'    => $article->title,
                'nav-link'      => $categories 
            ],
            'article'  => $article
        ]);
    }
}
