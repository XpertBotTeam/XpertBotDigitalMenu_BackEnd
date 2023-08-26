<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{

    public function listAll()
    {
        $OrderItem = OrderItem::all();
        return response()->json($OrderItem);
    }
    
    public function showOrderItem($id)
    {
        $OrderItem = OrderItem::find($id);
        if(!$OrderItem)
        {
            return response()->json(['error' => 'OrderItem not found'], 404);
        }
        return response()->json($OrderItem);
    }


    public function storeOrderItem(Request $request)
    {

        $validator = Validator::make($request->all(), [
        'ItemID'=>'required|exists:Items,id',
        'OrderID'=>'required|exists:Orders,id',
        'Quantity' => 'required|numeric',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $OrderItem = new OrderItem;
    $OrderItem->ItemID = $request->ItemID;
    $Item = Item::find($OrderItem->ItemID);
    $OrderItem->OrderID = $request->OrderID;
    $OrderItem->Quantity = $request->Quantity;
    $itemPrice = $Item->price;
    $OrderItem->SubTotal = $itemPrice * $OrderItem->Quantity;
    $OrderItem->save();

        return response()->json(['message' => 'OrderItem created successfully'], 201);
    }

    public function updateOrderItem(Request $request ,$id)
    {
        $OrderItem = OrderItem::find($id);
        if(!$OrderItem)
        {
            return response()->json(['error' => 'OrderItem not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'Quantity' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    

        $Item = Item::find($OrderItem->ItemID);
        $OrderItem->Quantity = $request->Quantity;
        $itemPrice = $Item->price;
        $OrderItem->SubTotal = $itemPrice * $OrderItem->Quantity;
        $OrderItem->save();

        return response()->json(['message' => 'OrderItem Updated successfully'], 201);
    }

    public function deleteOrderItem($id)
    {
        $OrderItem = OrderItem::find($id);
        if(!$OrderItem)
        {
            return response()->json(['error' => 'OrderItem not found'], 404);
        }
        $OrderItem->delete();
        return response()->json(['message'=>'OrderItem Deleted successfully']);

    }


}
