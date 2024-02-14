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
        <a href="{{route('backend.customers.index')}}" class="btn btn-primary">Customer index</a>
        <h4><center>Customer Information</center> </h4>
    </div>
    <div class="card-body">
        <table id="myDataTable" class="table table-bordered display">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Profession</th>
                    <th>Present Address</th>
                    <th>Parmanent Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1;
                @endphp
                @foreach($customers as $product)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->customer_name}}</td>
                    <td>{{$product->customer_phone}}</td>
                    <td>{{$product->profession}}</td>
                    <td>{{$product->present_address}}</td>
                    <td>{{$product->parmanent_address}}</td>

                    <td>
                        <a class='btn btn-sm btn-warning' href="{{route('backend.customers.restore', $customer->id)}}">Restore</a>
                        <form action="{{ route('backend.customers.pdelete', $customer->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button  id="bttn" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('backend.customers.pdelete', $customer->id) }}')">Parmanently Delete</button>
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
