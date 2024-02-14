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
        overflow-x: auto
    }

    /* Optional: Style the table for better appearance */
    #myDataTable {
        width: 100%
    }
</style>
<div class="card">
    <div class="card-header">
        <a href="{{route('backend.admin.trash')}}" class="btn btn-warning">Trash</a>
        <h4><center>Product Information</center> </h4>
    </div>
    <div class="card-body">
        <table id="myDataTable" class="table table-bordered display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Role Name</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Employee Photo</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Phone</th>
                    <th>Present Address</th>
                    <th>Permanent Address</th>
                    <th>Guardian's Phone</th>
                    <th>Guardian's Email</th>
                    <th>Emergency Contact Number</th>
                    <th>Action</th>

            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id}} </td>
                    <td>{{ $user->employee_id}} </td>
                    <td>{{ $user->role_name}} </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> {{$user->username }}</td>
                    <td>{{ $user->employee_photo}} </td>
                    <td>{{ $user->father_name }}</td>
                    <td> {{$user->mother_name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->present_address }}</td>
                    <td>{{ $user->parmanent_address}} </td>
                    <td> {{$user->gardian_phone}} </td>
                    <td>{{ $user->gardian_email}} </td>
                    <td>{{ $user->emergency_contact_number }}</td>

                    <td>
                        <a href="{{route('backend.admin.edit',$user->id)}}" class='btn btn-primary'>Edit</a>
                        <form action="{{ route('backend.admin.delete', $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button  id="bttn" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('backend.admin.delete', $user->id) }}')">Delete</button>
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
        })
    })
</script>

@endsection
