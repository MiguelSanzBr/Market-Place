<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
   public $Productid;
   
    public function index()
    {
        return view('Product.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $r,Product $product)
    {
     $validatedData = $r->validate([
    "price" => "required|numeric",
    "name" => "required|string|max:255",
    "describe" => "required|string",
    "category" => "required|string|max:90",
    "stored_quantity" => "required|integer|gt:0",
    "user_id" => "required|integer"
]);
      
       $productDb = Product::create($validatedData);
if ($productDb) {
    $idProduct = $productDb->id;
    $this->Productid = $idProduct;
    return redirect()->route('Product.img')->with('idProduct',$idProduct);
         
} else {
    die();
}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function img(Request $request)
    {
        $idProduct = $request->session()->get('idProduct');
        return view('Product.img',['idProduct' => $idProduct]);
    }

    /**
     * Display the specified resource.
     */
    public function edit(Image $image,Request $request)
    {
  $idProduct = $request->session()->get('idProduct');
  dd($idProduct);
  $images = $image->where('product_id', $idProduct)->get();
  $product = Product::where('id', $idProduct)->get();
  
  
foreach ($images as $image) {
dump($image);
  }
        return view('Product.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
