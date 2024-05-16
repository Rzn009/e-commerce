<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::select('id', 'name', 'image')->latest()->get();
        return view('pages.admin.category.index', compact('category',));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);

        try {
            // store image
            $data = $request->all();

            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            $data['image'] = $image->hashName();
            $data['slug'] = Str::slug($request->name);
            Category::create($data);

            // dd($category);

            return redirect()->back()->with('success', 'Category add succesfull');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add category');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        try {
            $category = Category::find($id);

            if ($request->hasFile('image') == '') {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);

                $category->update($data);
            } else {
                // delete image

                Storage::disk('local')->delete('public/category/' . basename($category->image));

                $image = $request->file('image');
                $image->storeAs('public/category/', $image->hashName());

                $data = $request->all();
                $data['image'] = $image->hashName();
                $data['slug'] = Str::slug($request->name);

                $category->update($data);
            }
            return redirect()->back()->with('success', 'Category add succesfull');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);

            // delete image

            Storage::disk('local')->delete('public/category/' . basename($category->image));

            //delete category
            $category->delete();

            return redirect()->back()->with('success', 'Category add succesfull');
        } catch (\Exception $e) {

            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete');
        }
    }
}
