<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Exception;
class CustomerController extends Controller
{
    public function create()
    {
        return view('backend.customers.make');
    }
    public function index()
    {
        $customers = Customer::all();
        return view('backend.customers.index',compact('customers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|unique:customers',
            'customer_phone' => 'required| min:11|unique:customers',
        ]);
        $data= $request->all();
        $customers = Customer::create($data);
        $request->session()->flash('success', ' Customer Successfully Created .');
        return redirect()->route('backend.customers.make');
    }


    public function edit(Request $request ,$customer)
    {
        
        $customer = customer::find($customer);
        return view('backend.customers.edit',compact('customer'));
    }
    public function update(Request $request ,$customer)
    {
        
        $customers = customer::all();
        // Find the customer by ID
        $customer= customer::findOrFail($customer);

        // Update the customer with the validated data
        $customer->update($request->all());

        return redirect()->route('backend.customers.index',compact('customer','customers'));
    }

    public function trash(){
        
        $customers = customer::onlyTrashed()->get();
        return view('backend.customers.trash',compact('customers'));
        
    }
    public function restore($customer)
    {
        
        try {
            // Find the trashed order
            $customer = customer::withTrashed()->findOrFail($customer);
    
            // Restore the order
            $customer->restore();
    
            return redirect()->route('backend.customers.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.customers.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $customer){
        
        $customer = customer::findOrFail($customer);

        // Soft delete the customer
        $customer->delete();

        return redirect()->route('backend.customers.index');
    }

    public function pdelete($customer)
    {
        
        try {
            // Find the order (including trashed)
            $customer = customer::withTrashed()->findOrFail($customer);

            // Permanently delete the order
            $customer->forceDelete();

            return redirect()->route('backend.customers.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.customers.trash')->with('error', 'Order not found');
        }
    }
   
}
