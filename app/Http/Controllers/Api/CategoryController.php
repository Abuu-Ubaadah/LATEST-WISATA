<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    // Get All Categories
    public function index()
    {
        $categories = Category::all();
        return ResponseHelper::success($categories, 'List Of Categories');

    }

    // Get Single Category
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return ResponseHelper::error('Category Has Not Been Found', 404);
        }
    
        return ResponseHelper::success($category, 'Category Details');
    }

    // Create Category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($request->all());

        return response()->json(['status' => 'success', 'category' => $category]);
    }

    // Update Category
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['status' => 'error', 'message' => 'Category Is Not Found'], 404);
        }

        $category->update($request->all());

        return response()->json(['status' => 'success', 'category' => $category]);
    }

    // Delete Category
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['status' => 'error', 'message' => 'Category Has Not Found'], 404);
        }

        $category->delete();

        return response()->json(['status' => 'success', 'message' => 'Category Has Deleted']);
    }
}
