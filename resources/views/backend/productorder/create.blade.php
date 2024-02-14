@extends('backend.master')
@section('content')
<style>
    .searchbar {
        width: 300px;
        height: 35px;
        border-style: round;
        border: 2px solid;
        border-radius: 5px;
    }

    #searchbar {
        height: 35px;
    }
    .card{
        margin-top:-40px;
    }
</style>

<div class="card">
    <div class="card-header"><center>Low Stock Products</center></div>
    <div class="card-body">
        <form action="{{ route('search.low.stock.products') }}" method="post">
            @csrf
            <div class="row mt-2">
                <div class="col-md-2">
                    <b>Enter the Quanity for search</b>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" value="4" name="quantity" placeholder="Enter the Quanity......." >
                </div>
                <div class="col-md-4">
                    <select name="supplier_name" id="category_id" class="form-control text-center" required>
                        <option value="">Select Supplier</option>
                        @foreach($suppliers as $supplier)
                        <option class="text-center" value="{{$supplier->supplier_name}}">{{$supplier->supplier_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class=" btn btn-primary form-control">Search Low Stock Products</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
