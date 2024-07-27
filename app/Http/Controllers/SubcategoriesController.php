<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;

        if ($subcategory->save()) {
            return response()->json([
                'message' => 'Subcategory created',
            ], 201);
        }

        return response()->json(['message' => 'Subcategory not created'], 500);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Subcategory::where('id', $id)->exists()) {
            $subcategory = Subcategory::find($id);
            return response()->json($subcategory);
        }

        return response()->json([
            'message' => 'Subcategory not found'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string|max:255',
        ]);

        if (Subcategory::where('id', $id)->exists()) {
            $subcategory = Subcategory::find($id);
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;
            $subcategory->description = $request->description;
            if ($subcategory->save()) {
                return response()->json([
                    'message' => 'Subcategory updated',
                ], 200);
            }

            return response()->json(['message' => 'Subcategory not updated'], 500);
        }

        return response()->json(['message' => 'Subcategory not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Subcategory::where('id', $id)->exists()) {
            $subcategory = Subcategory::find($id);
            if ($subcategory->delete()) {
                return response()->json([
                    'message' => 'Subcategory deleted',
                ], 200);
            }

            return response()->json(['message' => 'Subcategory not deleted'], 500);
        }

        return response()->json(['message' => 'Subcategory not found'], 404);
    }
}
