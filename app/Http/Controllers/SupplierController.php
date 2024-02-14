<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\supplier;
use Illuminate\Http\Request;
use Exception;
class supplierController extends Controller
{
    public function create()
    {
        $this->authorize('products');
        $companies= Company::all();
        return view('backend.supplier.create',compact('companies'));
    }
    public function store(Request $request)
    {
        $this->authorize('products');
        $data = $request->all();
        $suppliers = supplier::create($data);
        $request->session()->flash('success', ' supplier Successfully Created .');
        return redirect()->route('backend.supplier.create');
    }
    public function index()
    {
        $this->authorize('products');
        $suppliers = supplier::all();
        return view('backend.supplier.index',compact('suppliers'));
    }
    public function edit(Request $request ,$supplier)
    {
        $this->authorize('products');
        $supplier = supplier::find($supplier);
        return view('backend.supplier.edit',compact('supplier'));
    }
    public function update(Request $request ,$supplier)
    {
        $this->authorize('products');
        $suppliers = supplier::all();
        // Find the supplier by ID
        $supplier= supplier::findOrFail($supplier);

        // Update the supplier with the validated data
        $supplier->update($request->all());

        return redirect()->route('backend.supplier.index',compact('supplier','suppliers'));
    }

    public function trash(){
        $this->authorize('products');
        $suppliers = supplier::onlyTrashed()->get();
        return view('backend.supplier.trash',compact('suppliers'));
        
    }
    public function restore($supplier)
    {
        $this->authorize('products');
        try {
            // Find the trashed order
            $supplier = supplier::withTrashed()->findOrFail($supplier);
    
            // Restore the order
            $supplier->restore();
    
            return redirect()->route('backend.supplier.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.supplier.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $supplier){
        $this->authorize('products');
        $supplier = supplier::findOrFail($supplier);

        // Soft delete the supplier
        $supplier->delete();

        return redirect()->route('backend.supplier.index');
    }

    public function pdelete($supplier)
    {
        $this->authorize('products');
        try {
            // Find the order (including trashed)
            $supplier = supplier::withTrashed()->findOrFail($supplier);

            // Permanently delete the order
            $supplier->forceDelete();

            return redirect()->route('backend.supplier.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.supplier.trash')->with('error', 'Order not found');
        }
    }
   

}

