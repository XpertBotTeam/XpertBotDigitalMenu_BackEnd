<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;


class OrdersController extends Controller
{
    public function listAll()
    {
        $orders = Orders::All();
        return response()->json($orders);
    }

    public function showOrder($id)
    {
        $order = Orders::find($id);

        if(!$order)
        {
            return response()->json(['message'=>'Order not found'],404);
        }
        return response()->json($order);
    }

    public function storeOrder(Request $request)
    {    

        $validator = Validator::make($request->all(), [
            'CustomerID' => 'required|exists:Customers,id', 
        ]);

        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $order = new Orders;
        $order->CustomerID = $request->CustomerID; 
        $order->save();

        return response()->json(['message'=>'Order Created Successfully']);
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Orders::find($id);
        if(!$order)
        {
            return response()->json(['message'=>'Order not found'],404);
        }
    
        $order->status = $request->status; 
        $order->DeliveryInfo = $request->DeliveryInfo; 
        $order->save();

        return response()->json(['message'=>'Order updated successfully']);

    }
    
    
    public function deleteOrder($id)
    {
        $order = Orders::find($id);
        if(!$order)
        {
            return response()->json(['message'=>'Order not found'],404);
        }
        $order->delete();
        return response()->json(['message'=>'Order deleted successfully']);

    } 
}
