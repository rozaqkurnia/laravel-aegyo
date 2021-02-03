<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticle = \App\Models\Article::all()->count();
        $totalCategory = \App\Models\Category::all()->count();
        
        return response(['total' => [
            'article' => $totalArticle,
            'category' => $totalCategory
        ]], Response::HTTP_OK);
    }
}
