<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Category list";
        $data['categories'] = Category::all();
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Create category";

        return view('categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        if (Category::create($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Category created successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
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
        $data["title"] = "Edit category";
        $data["category"] = Category::find($id);
        return view('categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        $validatedData = $request->validated();
        if ($category->update($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Category updated successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Category = Category::find($id);
        if ($Category->delete()) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Category deleted successfully');
        }
    }
}
