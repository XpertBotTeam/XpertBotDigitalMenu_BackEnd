<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    public function listAll()
    {
        $Review = Review::all();
        return response()->json($Review);
    }
    
    public function showReview($id)
    {
        $Review = Review::find($id);
        if(!$Review)
        {
            return response()->json(['error' => 'Review not found'], 404);
        }
        return response()->json($Review);
    }


    public function storeReview(Request $request)
    {

    $validator = Validator::make($request->all(), [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:400',
        'CustomerID'=>'required|exists:Customers,id',
        'ItemID'=>'required|exists:Items,id',

    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $review = new Review;
    $review->rating = $request->rating;
    $review->comment = $request->comment;
    $review->ItemID = $request->ItemID;
    $review->CustomerID = $request->CustomerID;
    $review->save();

        return response()->json(['message' => 'Review created successfully'], 201);
    }

    public function updateReview(Request $request ,$id)
    {
        $Review = Review::find($id);
        if(!$Review)
        {
            return response()->json(['error' => 'Review not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:400',    
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $Review = new Review;
        $Review->rating = $request->rating;
        $Review->comment = $request->comment;
        $Review->save();

        return response()->json(['message' => 'Review Updated successfully'], 201);
    }

    public function deleteReview($id)
    {
        $Review = Review::find($id);
        if(!$Review)
        {
            return response()->json(['error' => 'Review not found'], 404);
        }
        $Review->delete();
        return response()->json(['message'=>'Review Deleted successfully']);

    }


}
