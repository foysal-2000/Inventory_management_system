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
        <a href="{{route('backend.invoiceitem.trash')}}" class="btn btn-warning">Trash</a>
        <h4><center>inventory Information</center> </h4>
    </div>
    <div class="card-body">
        <table id="myDataTable" class="table table-bordered display">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Inventory ID</th>
                    <th>Invoice No</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Customer ID</th>
                    <th hidden>Invoice Id</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1;
                @endphp
                @foreach($invoiceitems as $invoiceitem)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$invoiceitem->inventory_id}}</td> 
                    <td>{{$invoiceitem->invoice_no}}</td>
                    <td>{{$invoiceitem->product_name}}</td>
                    <td>{{$invoiceitem->unit_price}}</td>
                    <td>{{$invoiceitem->quantity}}</td>
                    <td>{{$invoiceitem->total_price}}</td>
                    <td>{{$invoiceitem->phone}}</td>
                    <td hidden>{{$invoiceitem->invoice_id}}</td>
                    <td>
                        <a class='btn btn-sm btn-warning' href="{{route('backend.invoiceitem.edit',$invoiceitem->id)}}">Edit</a>
                        <form action="{{ route('backend.invoiceitem.delete', $invoiceitem->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button  id="bttn" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('backend.invoiceitem.delete', $invoiceitem->id) }}')">Delete</button>
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