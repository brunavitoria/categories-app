<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $category = Category::where('id', $category)->first();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->category_id = $category->id;

        if ($subcategory->save()) {
            return response()->json([
                'message' => 'Subcategory created successfully',
            ], 201);
        }

        return response()->json(['message' => 'Subcategory not created'], 500);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $category, string $id)
    {
        $category = Category::where('id', $category)->first();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $subcategory = Subcategory::where('id', $id)->where('category_id', $category->id)->first();
        if (!$subcategory) {
            return response()->json(['message' => 'Subcategory not found'], 404);
        }

        return response()->json($subcategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $category, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $category = Category::where('id', $category)->first();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $subcategory = Subcategory::where('id', $id)->where('category_id', $category->id)->first();
        if (!$subcategory) {
            return response()->json(['message' => 'Subcategory not found'], 404);
        }

        $subcategory->name = $request->name;
        $subcategory->description = $request->description;

        if ($subcategory->save()) {
            return response()->json([
                'message' => 'Subcategory updated successfully',
            ], 200);
        }

        return response()->json(['message' => 'Subcategory not updated'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category, string $id)
    {
        $category = Category::where('id', $category)->first();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $subcategory = Subcategory::where('id', $id)->where('category_id', $category->id)->first();
        if (!$subcategory) {
            return response()->json(['message' => 'Subcategory not found'], 404);
        }

        if ($subcategory->delete()) {
            return response()->json([
                'message' => 'Subcategory deleted successfully',
            ], 200);
        }

        return response()->json(['message' => 'Subcategory not deleted'], 500);
    }
}
