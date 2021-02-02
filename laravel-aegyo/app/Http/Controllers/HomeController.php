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
        $categories = \App\Models\Category::orderBy('id')->get();
        $articles = \App\Models\Article::orderBy('id')->get();
        return view('home', [
            'categories' => $categories,
            'articles' => $articles
        ]);
    }
}
