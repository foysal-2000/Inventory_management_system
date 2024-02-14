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
    #bb{
        margin-left:500px;
    }
</style>
<div class="content">

    <div class="card">
        <div class="card-header">
            <a href="{{route('backend.productorder.create')}}" class="btn btn-primary">Make New Order </a>
            <center>All Products</center>
        </div>
        <br>
        <div class="card-body">
            <form action="{{ route('backend.productorder.store') }}" method="post">
                @csrf
                <table class="table table-bordered text-center">
                    <thead class="thead">
                        <tr class="tr">
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Supplier Name</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @php 
                        $i=1;
                        @endphp
                        @foreach($lowStockProducts as $product)
                        <tr class="tr">
                            <td>{{ $i++ }}</td>
                            <td><input readonly type="text" name="data[{{ $loop->index }}][product_name]" value="{{ $product->product_name }}" ></td>
                            <td><input type="number" name="data[{{ $loop->index }}][quantity]"  ></td>
                            <td><input type="text" name="data[{{ $loop->index }}][purchase_price]" value="{{ $product->purchase_price }}"  readonly></td>
                            <td><input type="text" name="data[{{ $loop->index }}][supplier_name]" value="{{ $product->supplier_name }}"  readonly></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <center><button class="btn btn-lg btn-primary" value="Order">Order</button></center>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
