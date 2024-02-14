<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Auth;
class AccountController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('backend.account.create', compact('user'));
    }
    public function store(Request $request, $userId)
    {
        
        $user = User::findOrFail($userId);
        $data = $request->all();
     
        $accounts = Account::create($data);
       $request->session()->flash('success', ' account Successfully Created .');
        return redirect()->route('backend.account.create');
    }
    public function index()
    {
        $accounts = Account::all();
        return view('backend.account.index',compact('accounts'));
    }
    public function edit(Request $request ,$account)
    {
        $account = Account::find($account);
        return view('backend.account.edit',compact('account'));
    }
    public function update(Request $request ,$account)
    {
        $accounts = Account::all();
        // Find the account by ID
        $account= Account::findOrFail($account);

        // Update the account with the validated data
        $account->update($request->all());

        return redirect()->route('backend.account.index',compact('account','accounts'));
    }

    public function trash(){
        
        $accounts = Account::onlyTrashed()->get();
        return view('backend.account.trash',compact('accounts'));
        
    }
    public function restore($account)
    {
        try {
            // Find the trashed account
            $account = Account::withTrashed()->findOrFail($account);
    
            // Restore the account
            $account->restore();
    
            return redirect()->route('backend.account.index')->with('success', 'account restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.account.trash')->with('error', 'account not found in trash');
        }
    }
    public function delete(Request $request, $account){
        $account = Account::findOrFail($account);

        // Soft delete the account
        $account->delete();

        return redirect()->route('backend.account.index');
    }

    public function pdelete($account)
    {
        try {
            // Find the account (including trashed)
            $account = Account::withTrashed()->findOrFail($account);

            // Permanently delete the account
            $account->forceDelete();

            return redirect()->route('backend.account.trash')->with('success', 'account permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.account.trash')->with('error', 'account not found');
        }
    }
   public function salary_clearance()
   {
     return view('backend.account.salary_clearance');
   }
   public function employee()
   {
     return view('auth.employee');
   }

 

    public function search(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $user = User::where('employee_id', $employeeId)->first();
        return view('backend.account.create', ['user' => $user]);
    }



}


