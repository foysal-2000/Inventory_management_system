<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Provuserers\RouteServiceProvuserer;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Valuseration\Rules;
use Illuminate\View\View;
use Illuminate\Valuseration\ValuserationException;
use Exception;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'lowercase', 'min:5', 'max:25', 'unique:users'],
        ]);
        $employeeuser = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        if ($request->hasFile('employee_photo')){ 
            $manager = new ImageManager(new Driver());
             $new_name = $request->name.".".$request->file('employee_photo')->getClientOriginalExtension(); 
             $img = $manager->read($request->file('employee_photo'));
             $img->tojpeg(80)->save(base_path('public/Employees/' .$new_name)); 
        }
        $data = $request->all();             
        // Generate a unique five-digit employee user
        $data['employee_id'] = $employeeuser;
        // Hash the password before storing in the database
        $data['password'] = Hash::make($request->password);
        $data['confirm'] = Hash::make($request->confirm);
        // Create the user with the provusered data
        $user = User::create($data);

        // Fire the registered event
        event(new Registered($user));

        // Login the user
        Auth::login($user);

        // Redirect the user after successful registration
        return redirect(RouteServiceProvider::HOME);
    }
    public function index()
    {
    
        $this->authorize('all');
        $users = User::all();
        return view('backend.admin.index',compact('users'));
    }
    public function role_index()
    {

        $this->authorize('all');
  
        $users = User::all();
        return view('backend.admin.role_index',compact('users'));
    }
    public function editrole($user)
    {
        $this->authorize('all');
        $user = User::find($user);
        return view('backend.admin.create_role',compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.admin.edit', compact('user'));
    }

    public function updaterole(Request $request, $user)
    {
        $this->authorize('all');

        // Find the user
        $user = User::findOrFail($user);
     
        // Update the role name
        $user->role_name = $request->role_name;
        $user->name = $request->name;

        $user->save();

        // Redirect or return a response
        return redirect()->route('backend.admin.role_index')->with('success', 'Role name updated successfully');
    }
    public function update(Request $request, $user)
    {
        $this->authorize('all');
        $data=$request->all();
        
        // Find the user
        $user = User::findOrFail($user);
     
        $user->update($request->all());
    
        // Redirect or return a response
        return redirect()->route('backend.admin.index')->with('success', 'Role name updated successfully');
    }
    public function delete_role(Request $request, $user)
    {
        $this->authorize('all');

        $user = User::findOrFail($user);
        $user->delete();

        // Redirect or return a response
        return redirect()->route('backend.admin.role_index')->with('success', 'Role  Deleted successfully');
    }


    public function trash()
    {
        $this->authorize('products');
        $users = User::onlyTrashed()->get();
        return view('backend.admin.trash',compact('users'));
        
    }
    public function restore($user)
    {
        $this->authorize('products');
        try {
            // Find the trashed order
            $user = User::withTrashed()->findOrFail($user);
    
            // Restore the order
            $user->restore();
    
            return redirect()->route('backend.admin.index')->with('success', 'Order restored successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.admin.trash')->with('error', 'Order not found in trash');
        }
    }
    public function delete(Request $request, $user){
        $this->authorize('products');
        $user = User::findOrFail($user);

        // Soft delete the company
        $user->delete();

        return redirect()->route('backend.admin.index');
    }

    public function pdelete($user)
    {
        $this->authorize('products');
        try {
            // Find the order (including trashed)
            $user = User::withTrashed()->findOrFail($user);

            // Permanently delete the order
            $user->forceDelete();

            return redirect()->route('backend.admin.trash')->with('success', 'Order permanently deleted successfully');
        } catch (Exception $exception) {
            return redirect()->route('backend.admin.trash')->with('error', 'Order not found');
        }
    }
 
}
