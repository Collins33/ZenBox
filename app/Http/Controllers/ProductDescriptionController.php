<?php

namespace App\Http\Controllers;
use App\Product;
use App\Description;
use Illuminate\Http\Request;

class ProductDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  product id  $productId
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        // display descriptions that belong to a particular product
        return Description::ofProduct($productId)->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($productId, Request $request)
    {   // validate your data
        $this->validate($request, [
            'name'=>'required|unique:products'
        ]);
        $product = Product::findOrFail($productId);
        $product->descriptions()->save(new Description([
            'body'=>$request->input('body')
        ]));
        return $product->descriptions;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name'=>$request->input('name')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
