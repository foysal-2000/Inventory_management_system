@extends('backend.master')
@section('content')
<div class="container">
   
    <div class="card">
        
                @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif
        <div class="card-header">
            <a href="{{route('backend.customers.update',$customer->id)}}" class="btn btn-lg btn-success">Customer List</a>
            <center><h3>Customer Information</h3></center>
        </div>
        <div class="card-body">
        <form Action="{{route('backend.customers.store')}}" method="Post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Customer Full Name:</label>
                    <input type="text" name="customer_name" value="{{$customer->customer_name}}" class="form-control" required>
                    @error('customer_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="customer_phone" value="{{$customer->customer_phone}}" class="form-control" required>
                    @error('customer_phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                   
                <div class="col-md-4">
                    <label class="form-label">Profession</label>
                    <input type="text" name="profession" value="{{$customer->profession}}" class="form-control" required>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Present Address</label>
                    <textarea type="text" name="present_address" value="{{$customer->present_address}}" class="form-control" required></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Parmanent Address</label>
                    <textarea type="text" name="parmanent_address" value="{{$customer->parmanent_address}}" class="form-control" required></textarea>
                </div>
            </div><br>
            <button type="submit" class="btn btn-lg btn-primary form-control">Create Customer</button>
        </div>
        </form>
    </div>
</div>
@endsection