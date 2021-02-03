<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        if($articles->isEmpty()){
            return response(['message' => 'No article available'], Response::HTTP_OK);
        }
        return response(ArticleResource::collection($articles), Response::HTTP_OK);
    }

    public function show($id)
    {
        $article = Article::find($id);
        if(!$article){
            return response(['error' => 'article not found'], Response::HTTP_NOT_FOUND);
        }
        return response(new ArticleResource($article), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $category_id = \App\Models\Category::find($request->category_id);
        if(!$category_id){
            return response(['error' => 'Category not found'], Response::HTTP_BAD_REQUEST);
        }
        $article = Article::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);
        return response(new ArticleResource($article), Response::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);
        if(!$article){
            return response(['error' => 'article not found'], Response::HTTP_BAD_REQUEST);
        }
        $category_id = \App\Models\Category::find($request->category_id);
        if(!$category_id){
            return response(['error' => 'Category not found'], Response::HTTP_BAD_REQUEST);
        }
        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content
        ]);
        $article->save();
        return response(new ArticleResource($article), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if(!$article){
            return response(['error' => 'article not found'], Response::HTTP_BAD_REQUEST);
        }
        $article->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}