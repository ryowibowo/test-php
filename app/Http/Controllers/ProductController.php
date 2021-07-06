<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use File;

class ProductController extends Controller
{
    public function index(Request $request)
    {   
        if($request->has('q')){
            $product = Product::where('name','LIKE','%'.$request->q.'%')->paginate(10);

        }else{
            $product = Product::paginate(5);
        }

    	return view('products.index', compact('product'));
    }

    public function create()
    {
    	return view('products.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name'			 => 'required|string|unique:products',
    		'image'			 => 'required|image|mimes:png,jpeg,jpg|max:5000',
	    	'price' 		 => 'required|integer',
	    	'stock'			 => 'required|integer'
	    	
    	]);

    	if ($request->hasFile('image')){
    		$file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
    	}

    	$product = Product::create([
    		'name' 		  => $request->name,
    		'image'	   	  => $filename,
    		'price'		  => $request->price,
    		'stock'		  => $request->stock
    	]);

    	// dd($request->all());

    	return redirect('/listproduct')->with(['success' => 'Produk Baru Ditambahkan']);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products/show', compact('product'));
    }

    public function edit($id)
    {
    	$product = Product::findOrFail($id);
    	return view('products/edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'name'			 => 'required|string|unique:products',
    		'image'			 => 'nullable|image|mimes:png,jpeg,jpg|max:5000',
	    	'price' 		 => 'required|integer',
	    	'stock'			 => 'required|integer'
	    	
    	]);

    	$product = Product::find($id);
    	$filename = $product->image;

	    if ($request->hasFile('image')) {
	        $file = $request->file('image');
	        $filename = time() . '.' . $file->getClientOriginalExtension();
	        //MAKA UPLOAD FILE TERSEBUT
	        $file->storeAs('public/products', $filename);
	      	//DAN HAPUS FILE GAMBAR YANG LAMA
	        File::delete(storage_path('app/public/products/' . $product->image));
	    }


	    $product->update([
    		'name' => $request->name,
    		'image' => $filename,
    		'price' => $request->price,
    		'stock' => $request->stock
    	]);

	    // dd($request->all());

    	return redirect('/listproduct')->with(['success' => 'Produk Berhasil Diperbaharui']);
    }

    public function delete($id)
    {
    	$product = Product::find($id);
    	File::delete(storage_path('app/public/products/' . $product->image));
    	$product->delete();
    	return redirect('/listproduct')->with(['success' => 'Produk Berhasil Dihapus']);
    }
}
