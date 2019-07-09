<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $category = Category::create([
            'name' => $data["name"],
            'url' => $data["url"],
            'is_main' => $data["is_main"]
        ]);

        $categories = Category::all();
        return view('categorieslist')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = Category::all();

        return view('categorieslist')->with('categories', $categories);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('editcategory')->with('category', $category);
    }

    public function edit(Request $data)
    {

        $category = Category::find($data->id);
        $category->name = $data->name;
        $category->url = $data->url;
        $category->is_main = $data->is_main;
        $category->save();

        $categories = Category::all();

        return view('categorieslist')->with('categories', $categories);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
            $category->delete();


        $categories = Category::all();

        return view('categorieslist')->with('categories', $categories);
    }
}
