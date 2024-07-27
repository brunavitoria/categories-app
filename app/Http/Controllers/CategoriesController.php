<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|string|max:255',
            'description' => 'nullable|string|max:255'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if ($category->save()) {
            return response()->json([
                'message' => 'Category created successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'Category not created'
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            return response()->json($category);
        }
        return response()->json([
            'message' => 'Category not found'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $id,
                'description' => 'nullable|string|max:255'
            ]);

            $category->name = $request->name;
            $category->description = $request->description;
            if ($category->save()) {
                return response()->json([
                    'message' => 'Category updated successfully'
                ], 200);
            }

            return response()->json([
                'message' => 'Category not updated'
            ], 500);
        }
        
        return response()->json([
            'message' => 'Category not found'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            $category->delete();
                
            return response()->json([
                'message' => 'Category deleted successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'Category not found'
        ], 404);
    }
}
