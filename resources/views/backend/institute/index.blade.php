@extends('backend.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <table class="table table-bordered table-sm table-fit-content">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Branch Name</th>
                        <th>Branch Code</th>
                        <th>Address</th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                @foreach($companys as $company)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$company->company_name}}</td>
                        <td>
                                @if ($company->image)
                                <img src="{{ asset('app/public/institute/' . $company->image) }}" alt="company image">

                                @else
                                No Image
                                @endif
                            </td>
                        <td>{{$company->branch_name}}</td>
                        <td>{{$company->branch_code}}</td>
                        <td>{{$company->address}}</td>
                        <td>
                            <a href="{{route('backend.institute.edit',$company->id)}}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('backend.institute.delete', $company->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button  id="bttn" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('backend.institute.delete', $company->id) }}')">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
