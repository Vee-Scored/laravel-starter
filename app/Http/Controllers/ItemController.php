<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search (Request $request) {
        $query = $request->input("query");
        $items = Item::WHERE("name","LIKE","%$query%")->orWhere("status","LIKE","%$query%")->paginate(5);

        return view("item.index",compact("items"));
    }

    public function index()
    {
        $items = Item::paginate(5);
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cM = new Category();
        $categories= $cM::all();
        return view('item.create',compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;

        $item = new Item();
        $item->name = $request->name;
        $item->stock = $request->stock;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->status = $request->status;
        $item->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view("item.edit",compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        $item->name = $request->name;
        $item->stock = $request->stock;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->status = $request->status;
        $item->update();

        return redirect()->route("item.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);

        if ($item->id == $id) {
            $item->delete();
            return redirect()->route('item.index');
        }
    }
}
