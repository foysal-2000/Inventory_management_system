@extends('backend.master')
@section('content')
<style>
    .table-sm td, .table-sm th {
        font-size: 14px;
    }

    .table-fit-content td, .table-fit-content th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 150px; /* Adjust as needed */
    }

    .table-fit-content img {
        max-width: 60px; /* Adjust as needed */
        max-height: 60px; /* Adjust as needed */
    }
    .form-control{
        margin-left:320px;
        width: 500px;
        height:50px;
    }
    #btn{
        height:50px;
        margin-top:-75px;
        margin-left:850px;
    }
    #bb{
        margin-left:1300px;
    }
    #b{
        margin-right:400px;
        align:left;
    }
</style>

<form action="{{ route('backend.product.search') }}" method="post">
    @csrf
    <input type="text" name="order_id" class='form-control' placeholder="Enter Order ID">
    <button type="submit" id="btn" class="btn btn-lg btn-primary ">Search</button>
</form>
<div class="card">
    <div class="card-header text-center">Product list <a href="{{route('backend.productorder.show-order')}}" id="b" class="btn btn-primary">Order List</a><a id="bb" href="{{ route('backend.productorder.pdf', ['order_id' => $searchedOrderId ?? null]) }}" class="btn btn-primary">Print Order</a>
</div>
    <div class="card-body">
            <p><b> Order ID:</b> @isset($searchedOrderId) - {{ $searchedOrderId }} @endisset</p><br>
        @isset($products)
                <table class="table table-bordered table-striped table-sm table-fit-content text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Supplier Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->supplier_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
        @endisset
    </div>
</div>
@endsection
