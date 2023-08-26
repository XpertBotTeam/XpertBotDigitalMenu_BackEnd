<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\OrderItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


Route::get('/categories',[CategoryController::class,'listAll']);
Route::get('/categories/{id}',[CategoryController::class,'showCategory']);
Route::post('/categories',[CategoryController::class,'storeCategory']);
Route::put('/categories/{id}',[CategoryController::class,'updateCategory']);
Route::delete('/categories/{id}',[CategoryController::class,'deleteCategory']);

Route::get('/customers',[CustomerController::class,'listAll']);
Route::get('/customers/{id}',[CustomerController::class,'showCustomer']);
Route::post('/customers',[CustomerController::class,'storeCustomer']);
Route::put('/customers/{id}',[CustomerController::class,'updateCustomer']);
Route::delete('/customers/{id}',[CustomerController::class,'deleteCustomer']);

Route::get('/items',[ItemController::class,'listAll']);
Route::get('/items/{id}',[ItemController::class,'showItem']);
Route::post('/items',[ItemController::class,'storeItem']);
Route::put('/items/{id}',[ItemController::class,'updateItem']);
Route::delete('/items/{id}',[ItemController::class,'deleteItem']);

Route::get('/orders',[OrdersController::class,'listAll']);
Route::get('/orders/{id}',[OrdersController::class,'showOrder']);
Route::post('/orders',[OrdersController::class,'storeOrder']);
Route::put('/orders/{id}',[OrdersController::class,'updateOrder']);
Route::delete('/orders/{id}',[OrdersController::class,'deleteOrder']);


Route::get('/review',[ReviewController::class,'listAll']);
Route::get('/review/{id}',[ReviewController::class,'showReview']);
Route::post('/review',[ReviewController::class,'storeReview']);
Route::put('/review/{id}',[ReviewController::class,'updateReview']);
Route::delete('/review/{id}',[ReviewController::class,'deleteReview']);


Route::get('/orderItem',[OrderItemController::class,'listAll']);
Route::get('/orderItem/{id}',[OrderItemController::class,'showOrderItem']);
Route::post('/orderItem',[OrderItemController::class,'storeOrderItem']);
Route::put('/orderItem/{id}',[OrderItemController::class,'updateOrderItem']);
Route::delete('/orderItem/{id}',[OrderItemController::class,'deleteOrderItem']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// {
//     "Fname":"hwllo",
//     "Lname":"all",
//     "email":"Haaisunnn44444kn@gmail.com",
//     "password":"admin123",
//     "phoneNb":"1287618yr86",
//     "address":"skdhsdn323uf"
// }


// {
//     "name":"Food",
//     "price":"13",
//     "description":"asfndfhdufh aFood",
//     "imageURL":"Ffasfasafasfasood",
//     "ItemAvailability":"Available",
//     "CategoryID":"1"
// }


// {
//     "rating":"5",
//     "comment":"bad",
//     "CustomerID":"1",
//     "ItemID":"1"
// }

// {
//     "SubTotal":"5",
//     "Quantity":"2",
//     "OrderID":"1",
//     "ItemID":"1"
// }