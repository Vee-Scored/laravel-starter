<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use GuzzleHttp\Psr7\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function search (Request $request) {
            // $query = $request->input("query");
            // return $query;
     }
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("category.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = Category::find($category->id);
        if ($category) {
            $category->name = $request->name;
            $category->description  = $request->description;
            $category->update();
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);

        if ($category) {
            $category->delete();
            return redirect()->route('category.index');
        }
    }
}
