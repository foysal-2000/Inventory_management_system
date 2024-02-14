@extends('backend.master')
@section('content')
    <style>
        body{
            background-color:#ACE5EF;
        }
        .img{
            width: 50px;
            margin-left:350px;

        }
        .header{
            margin-left:60px;
            margin-top:-50px;
        }
        .card{
            background-color:#DFF3F6;
            color:Black;
        }
        .head{
            background-color:gray;
            color:yellow;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                    <img class='img' src="{{asset('backend')}}/assets/img/employee.png">
                    <center>
                        <h1 class='header'>User Registration Form</h1>
                    </center>
            </div><br>
            <div class="card-body">
            <form action="{{route('backend.admin.update',$user->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Employee Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}} " required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Email Adress</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}} " required>
                        @error('email')
                        <div id="passwordError" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Username</label>
                        <input type="text" name="username" class="form-control" value="{{$user->username}}" required>
                        @error('username')
                        <div id="passwordError" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Password</label>
                        <input type="password" name="password" class="form-control" value="{{$user->password}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Confirm Password</label>
                        <input type="password" name="confirm" class="form-control" value="{{$user->confirm}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Employee Photo</label>
                        <input type="file" name="employee_photo" class="form-control" value="{{$user->employee_photo}}" >
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Father Name</label>
                        <input type="text" name="father_name" class="form-control" value="{{$user->father_name}}" >
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" value="{{$user->mother_name}}" >
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Phone Number</label>
                        <input type="number" name="phone" class="form-control" value=" {{$user->phone}}" >
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label class='form-label'>Present Address</label>
                        <textarea type="text" name="present_address" class="form-control" value=" {{$user->present_address}}" ></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class='form-label'>Parmanent Address</label>
                        <textarea type="text" name="parmanent_address" class="form-control" value=" {{$user->parmanent_address}}" ></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Gardian Number</label>
                        <input type="number" name="gardian_phone" class="form-control" value="{{$user->gardian_phone}}" >
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Gardian Email Address</label>
                        <input type="email" name="gardian_email" class="form-control" value="{{$user->gardian_email}}" >
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Emargency Contact Number</label>
                        <input type="number" name="emergency_contact_number" class="form-control" value="{{$user->emergency_contact_number}} " >
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary form-control" id="register">Create Employee</button><br><br> 
                    </div>
                </div>  
            </div>
            </form>    
            </div>
        </div>
    </div>
@endsection