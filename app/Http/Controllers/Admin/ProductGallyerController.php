<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductGallyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {



        $product = Product::findOrFail($id);
        $gallery = $product->product_gallery;
        // dd($product);

        return view('pages.admin.product.gallery.index', compact('product', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        try {
            $files = $request->file('files');
            foreach ($files as $file) {
                $file->storeAs('public/product/gallery', $file->hashName());

                $product->product_gallery()->create([
                    'product_id' => $product->id,
                    'image' => $file->hashName()
                ]);
            }
            return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Berhasil');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $product->id)->with('error', 'failed to create');
        }
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
        return view('pages.admin.product.gallery.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductGallery $gallery)
    {
        try {
            $product = $product->findOrFail($product->id);

            //get data image by id
            $gallery = $gallery->findOrFail($gallery->id);
            Storage::delete('public/product/gallery/' . basename($gallery->image));

            //delete image from storage
            $gallery->delete();

            return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Image deleted successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $product->id)->with('error', 'failed to create');
        }
    }
}
