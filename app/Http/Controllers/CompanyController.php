<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Exception;
class companyController extends Controller
{
    public function create()
    {
        $this->authorize('products');

        return view('backend.company.create');
    }
    public function store(Request $request)
    {
        $this->authorize('products');
        $request->validate([
            'company_name' => 'required',
            'phone' => 'required|min:11',
        ]);
        $data = $request->all();
        
        $companies = company::create($data);
        $request->session()->flash('success', ' company Successfully Created .');
        return redirect()->route('backend.company.create');
    }
    public function index()
    {
        $this->authorize('products');
        $companies = company::all();
        return view('backend.company.index',compact('companies'));
    }
    public function edit(Request $request ,$company)
    {
        $this->authorize('products');
        $company = company::find($company);
        return view('backend.company.edit',compact('company'));
    }
    public function update(Request $request ,$company)
    {
        $this->authorize('products');
        $companies = company::all();
        // Find the company by ID
        $company= company::findOrFail($company);

        // Update the company with the validated data
        $company->update($request->all());

        return redirect()->route('backend.company.index',compact('company','companies'));
    }

    public function trash()
    {
        $this->authorize('products');
        $companies = company::onlyTrashed()->get();
        return view('backend.company.trash',compact('companies'));
        
    }
    public function restore($company)
    {
        $this->authorize('products');
        try {
            // Find the trashed order
            $company = company::withTrashed()->findOrFail($company);
    
            // Restore the order
            $company->restore();
    
            return redirect()->route('backend.company.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.company.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $company){
        $this->authorize('products');
        $company = company::findOrFail($company);

        // Soft delete the company
        $company->delete();

        return redirect()->route('backend.company.index');
    }

    public function pdelete($company)
    {
        $this->authorize('products');
        try {
            // Find the order (including trashed)
            $company = company::withTrashed()->findOrFail($company);

            // Permanently delete the order
            $company->forceDelete();

            return redirect()->route('backend.company.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.company.trash')->with('error', 'Order not found');
        }
    }
   

}
