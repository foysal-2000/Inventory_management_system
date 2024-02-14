<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function create()
    {
        return view('backend.institute.create');
    }
    public function store(Request $request)
    {


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as per your requirement
            // Add other validation rules for your fields here
        ]);

        $product = new Institute;
        $product->company_name = $request->company_name;
        $product->address = $request->address;
        $product->branch_name = $request->branch_name;
        $product->branch_code = $request->branch_code;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('institute', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        //$data = $request->all();
       // dd($data);
        //$companys = Institute::create($data);
        return redirect()->route('backend.institute.create')->with('success', 'Institue Created Successfully');
    }
    public function edit(Request $request, $company)
    {
        $companys = Institute::all();
        $company = Institute::find($company);
        return view('backend.institute.edit',compact('companys','company'));
    }

    public function update(Request $request, $company)
    {
        $companys = Institute::all();
        $company = Institute::find($company);
   
        $company->update($request->all());
        return redirect()->route('backend.institute.index',compact('companys'));
    }
    public function index()
    {
 
        $companys = Institute::all();
        return view('backend.institute.index',compact('companys'));
    }
    public function delete(Request $request, $company)
    {
        $company = Institute::find($company);
        $companys = Institute::all();
        $company->delete();
        return redirect()->route('backend.institute.index',compact('companys'));
    }
}
