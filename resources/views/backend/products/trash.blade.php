@extends('backend.master')
@section('content')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- DataTables Responsive CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- DataTables Responsive JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>

<style>
    /* Optional: You can add some custom styling to adjust the appearance */
    #myDataTable_wrapper {
        overflow-x: auto;
    }

    /* Optional: Style the table for better appearance */
    #myDataTable {
        width: 100%;
    }
</style>
<div class="card">
    <div class="card-header">
        <a href="{{route('backend.products.index')}}" class="btn btn-primary">Product List</a>
        <h4><center>Product Information</center> </h4>
    </div>
    <div class="card-body">
        <table id="myDataTable" class="table table-bordered display">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Barcode No.</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Purchase Price</th>
                    <th>Selling Price</th>
                    <th>Stock (Quantity)</th>
                    <th>Profit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1;
                @endphp
                @foreach($products as $product)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->barcode}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->purchase_price}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->profit}}</td>
                    <td>
                        <a class='btn btn-sm btn-warning' href="{{route('backend.products.restore', $product->id)}}">Restore</a>
                        <form action="{{ route('backend.products.parmanent_delete', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button  id="bttn" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('backend.products.parmanent_delete', $product->id) }}')">Parmanent Delete</button>
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
