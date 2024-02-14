@extends('backend.master')
@section('content')
<style>
    body {
        background-color: #ACE5EF;
    }

    .img {
        width: 50px;
        margin-left: 350px;
    }

    .header {
        margin-left: 60px;
        margin-top: -50px;
    }

    .card {
        background-color: #DFF3F6;
        color: Black;
    }

    .head {
        background-color: gray;
        color: yellow;
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
            <form action="{{route('auth.update',$user->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Employee Full Name</td>
                            <td><input type="text" name="name" class="form-control" value="{{$user->name}}" required></td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td><input type="email" name="email" class="form-control" value="{{$user->email}}" required></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" class="form-control" value="{{$user->username}}" required></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" class="form-control" value="{{$user->password}}" required></td>
                        </tr>
                        <!-- Add more table rows for other user attributes -->
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary form-control" id="register">Update Employee</button><br><br>
            </form>
        </div>
    </div>
</div>
@endsection
