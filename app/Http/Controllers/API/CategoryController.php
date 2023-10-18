<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function listAll()
    {
        $Category = Category::all();
        return view('Categories')->with('Category', $Category);

    }
    
    public function showCategory($id)
    {
        $Category = Category::find($id);
        if(!$Category)
        {
            return response()->json(['error' => 'Category not found'], 404);
        }
        return response()->json($Category);
    }


    public function storeCategory(Request $request)
    {
        $Category = Category::where('CategoryName', $request->CategoryName)->first();
        
        $validatedData = $request->validate([
            'CategoryName' => 'required|max:20',
        ]);

        if (!is_null($Category)) {
            return response()->json(['error' => 'Category Name already found'], 400);
        }

        $Category = new Category;
        $Category->CategoryName = $validatedData['CategoryName'];
        $Category->save();

        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function updateCategory(Request $request ,$id)
    {
        $Category = Category::find($id);
        if(!$Category)
        {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'CategoryName' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $Category->CategoryName = $request->input('CategoryName');
        $Category->save();

        return response()->json(['message' => 'Category Updated successfully'], 201);
    }

    public function deleteCategory($id)
    {
        $Category = Category::find($id);
        if(!$Category)
        {
            return response()->json(['error' => 'Category not found'], 404);
        }
        $Category->delete();
        return response()->json(['message'=>'Category Deleted successfully']);

    }

    public function show($CategoryID)
    {
        $category = Category::findOrFail($CategoryID);
        $items = $category->items;
    
        return view('showitems', compact('category', 'items'));
    }



}
