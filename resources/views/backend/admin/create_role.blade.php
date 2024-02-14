@extends('backend.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Admin Entry Form</div><br>
        <div class="card-body">
            <form action="{{route('backend.admin.updaterole',$user->id)}}" method='post'>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Employee name</label>
                        <input type='text' class="form-control" value="{{$user->name}}" name='name'>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Designation</label>
                        <select name="role_name" class="form-control">
                            <option value="">Select Role</option>
                            <option value="Admin" >Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Warehouse Operator">Warehouse Operator</option>
                            <option value="Cashier">Cashier</option>
                        </select>
                    </div>
                </div><br>
                <button type='submit' class="btn btn-lg btn-primary form-control">Update Role Management</button>
            </form>
        </div>
    </div>
</div>

@endsection