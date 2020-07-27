<?php

namespace App\Http\Controllers\Laundry;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Category;
use App\Laundry;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Laundry $laundry)
    {
       

        $categories = $laundry->categories->map(function($category){
           $category->sub_name = Str::of($category->name)->replaceMatches('/[^A-Za-z0-9]++/','') ;
           return $category;
        });
     
        return view('categories.index',compact('categories','laundry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPricing(Request $request)
    {
        $data =  $request->validate([
            'priceDescription' => 'required',
            'amount' => 'required'
        ]);
        $category = Category::findOrFail($request->input('category'));

        $category->services()->create([
            'priceDescription' => $data['priceDescription'],
            'amount' => $data['amount']
        ]);

        return back();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'category' => 'required'
        ]);
        $laundry = Laundry::findOrFail($request->input('laundry'));

        $laundry->categories()->create([
            'name' => $data['category']
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
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
    public function destroy(Category $category)
    {
        //
    }
}
