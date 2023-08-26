<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function listAll()
    {
        $Customers = Customer::all();
        return response()->json($Customers);
    }
    
    public function showCustomer($id)
    {
        $Customer = Customer::find($id);
        if(!$Customer)
        {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        return response()->json($Customer);
    }


    public function storeCustomer(Request $request)
    {
        $Customer = Customer::where('id', $request->id)->first();

        if (!is_null($Customer)) {
            return response()->json(['error' => 'Customer already found'], 400);
        }
        
        $validator = Validator::make($request->all(), [

            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'phoneNb' => 'required|string|min:6',
            'address' => 'required|string|min:6'

        ]);

        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $Customer = new Customer;
        $Customer->Fname = $request->input('Fname');
        $Customer->LName = $request->input('Lname');
        $Customer->email = $request->input('email');
        $Customer->password = bcrypt($request->input('password'));
        $Customer->phoneNb = $request->input('phoneNb');
        $Customer->address = $request->input('address');
        $Customer->save();

        return response()->json(['message' => 'Customer created successfully'], 201);
    }

    public function updateCustomer(Request $request ,$id)
    {
        $Customer = Customer::find($id);
        if(!$Customer)
        {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'phoneNb' => 'required|string|min:6',
            'address' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $Customer->Fname = $request->input('Fname');
        $Customer->LName = $request->input('Lname');
        $Customer->email = $request->input('email');
        $Customer->password = $request->input('password');
        $Customer->phoneNb = $request->input('phoneNb');
        $Customer->address = $request->input('address');
        $Customer->save();

        return response()->json(['message' => 'Customer Updated successfully'], 201);
    }

    public function deleteCustomer($id)
    {
        $Customer = Customer::find($id);
        if(!$Customer)
        {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        $Customer->delete();
        return response()->json(['message'=>'Customer Deleted successfully']);

    }


}
