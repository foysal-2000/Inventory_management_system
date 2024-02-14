
@extends('backend.master')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>

<style>

    #myDataTable_wrapper {
        overflow-x: auto;
    }


    #myDataTable {
        width: 100%;
    }
    #bb{
        margin-left:500px;
    }
</style>
<a href="{{route('backend.productorder.search')}}" id=bb" class="btn btn-primary"> Search Order </a>
<div class="card">
    
    <div class="card-header">
        <a href="{{route('backend.productorder.create')}}" class="btn btn-primary">Make New Orders</a>
        <h4><center>Product Information</center> </h4>
    </div>
    <div class="card-body">
        <table id="myDataTable" class="table table-bordered display">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Purchase Price</th>
                    <th>Quantity</th>
                    <th>Supplier Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1;
                @endphp
                @foreach($products as $product)
                <tr>
                <td>{{ $product->order_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->supplier_name }}</td>
                    <td>
                        <a href="{{route('backend.productorder.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('backend.productorder.delete', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button  id="bttn" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('backend.productorder.delete', $product->id) }}')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable({
            "paging": true,
            "searching": true,
            "responsive": true, // Enable responsiveness
            // Add more options as needed
        });
    });
</script>

@endsection
