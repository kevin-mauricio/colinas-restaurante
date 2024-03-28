<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categoria::all();
        return view('view_category_list', compact('categories'));
    }

    public function createView()
    {
        return view('view_category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        Categoria::create($request->all());
        return redirect()->route('index_category')->with([
            'alert' => ['color' => 'success', 'message' => 'Category created']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $category)
    {
        return view('view_category_show', compact('category'));
    }

    public function edit(Categoria $category)
    {
        return view('view_category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $category)
    {
        $category->update($request->all());
        return redirect()->route('index_category')->with([
            'alert' => ['color' => 'warning', 'message' => 'Category updated']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Categoria $category)
    {
        $category->delete();
        return redirect()->route('index_category')->with([
            'alert' => ['color' => 'danger', 'message' => 'Category deleted']
        ]);
    }
}
