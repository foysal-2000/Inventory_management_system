<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Exception;
class categoryController extends Controller
{
    public function create()
    {
        $this->authorize('products');
        return view('backend.categories.create');
    }
    public function store(Request $request)
    {
        $this->authorize('products');
        $request->validate([
            'category' => 'required|unique:categories',
            'creator_name' => 'required',
            'creator_designation' => 'required',
        ]);
        $data = $request->all();
        $categories = category::create($data);
       $request->session()->flash('success', ' category Successfully Created .');
        return redirect()->route('backend.categories.create');
    }
    public function index()
    {
        $this->authorize('products');
        $categories = category::all();
        return view('backend.categories.index',compact('categories'));
    }
    public function edit(Request $request ,$category)
    {
        $this->authorize('products');
        $category = category::find($category);
        return view('backend.categories.edit',compact('category'));
    }
    public function update(Request $request ,$category)
    {
        $this->authorize('products');
        $categories = category::all();
        // Find the category by ID
        $category= category::findOrFail($category);

        // Update the category with the validated data
        $category->update($request->all());

        return redirect()->route('backend.categories.index',compact('category','categories'));
    }

    public function trash(){
        $this->authorize('products');
        $categories = category::onlyTrashed()->get();
        return view('backend.categories.trash',compact('categories'));
        
    }
    public function restore($category)
    {
        $this->authorize('products');
        try {
            // Find the trashed order
            $category = category::withTrashed()->findOrFail($category);
    
            // Restore the order
            $category->restore();
    
            return redirect()->route('backend.categories.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.categories.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $category){
        $this->authorize('products');
        $category = category::findOrFail($category);

        // Soft delete the category
        $category->delete();

        return redirect()->route('backend.categories.index');
    }

    public function pdelete($category)
    {
        $this->authorize('products');
        try {
            // Find the order (including trashed)
            $category = category::withTrashed()->findOrFail($category);

            // Permanently delete the order
            $category->forceDelete();

            return redirect()->route('backend.categories.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.categories.trash')->with('error', 'Order not found');
        }
    }
   

}

