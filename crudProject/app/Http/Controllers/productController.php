<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $products = Product::all();
      return view('product.product-list' , ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::all();
      return view('product.product-create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $desc =   $request->description;
        $price = $request->price;
        $category = $request->category;

        Product::create([
          'title' => $title,
          'description' => $desc ,
          'price' => $price,
          'category_id' => $category
        ]);

        return redirect()->route('product');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.product-view', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $categories = Category::all();
      $product = Product::find($id);
      return view('product.product-edit', ['product' => $product, 'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $product = Product::find($id);
        $title = $request->title;
        $desc = $request->description;
        $price = $request->price;
        $category = $request->category;
      $product->title = $title;
      $product->description = $desc;
      $product->price = $price;
      $product->category_id = $category;
      $product->save();

      return redirect()->route("product");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product");
    }
}
