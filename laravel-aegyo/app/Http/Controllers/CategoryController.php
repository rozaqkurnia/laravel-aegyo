<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        if($categories->isEmpty()){
            return response(["message" => "No category available"], Response::HTTP_OK);
        }
        return response($categories, Response::HTTP_OK);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
            return response(["error" => "category not found"], Response::HTTP_NOT_FOUND);
        }
        return $category;
    }

    public function store(Request $request)
    {
        $category = Category::create($request->only('name'));
        return response($category, Response::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);
        if(!$category){
            return response(["error" => "category not found"], Response::HTTP_BAD_REQUEST);
        }
        $category->update([
            'name' => $request->name
        ]);
        $category->save();
        return response($category, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            return response(["error" => "category not found"], Response::HTTP_BAD_REQUEST);
        }
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
