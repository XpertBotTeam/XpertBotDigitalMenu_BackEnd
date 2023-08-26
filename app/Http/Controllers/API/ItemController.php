<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class ItemController extends Controller
{
    public function listAll()
    {
        $items = Item::all();
        return $items;
    }


    public function showItem($id)
    {
        $item = Item::find($id);
        if(!$item)
        {
            return response()->json(['Message'=>'Item Not found'],404);
        }
        return response()->json($item);
    }

    public function storeItem(Request $request)
    {
        $item = Item::where('name',$request->name)->first();
        
        if(!is_null($item))
        {
            return response()->json(['message'=>'Item Already found'],400);
        }

        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:200',
            'price'=>'required|numeric',
            'description'=>'required|string|max:400',
            'imageURL'=>'required|string',
            'CategoryID'=>'required|exists:Categories,id',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->imageURL = $request->imageURL;
        $item->CategoryID = $request->CategoryID; 
        $item->ItemAvailability = $request->ItemAvailability; 


        $item->save();

        return response()->json(['message'=>'Item Created successfully'],201);
    }


    public function updateItem(Request $request, $id)
    {
        $item = Item::find($id);
        if(!$item)
        {
            return response()->json(['message'=>'Item not found'],404);
        }

        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:200',
            'price'=>'required|numeric',
            'description'=>'required|string|max:400',
            'imageURL'=>'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->imageURL = $request->imageURL;
        $item->CategoryID = $request->CategoryID; 
        $item->ItemAvailability = $request->ItemAvailability; 
        $item->save();

        return response()->json(['message'=>'Item updated successfully']);
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        if(!$item)
        {
            return response()->json(['message'=>'Item not found'],404);
        }
        $item->delete();
        return response()->json(['message'=>'Item deleted successfully']);
    }
}