<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
  </head>
  <body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                    <img class='img' src="{{asset('backend')}}/assets/img/employee.png">
                    <center>
                        <h1 class='header'>User Registration Form</h1>
                    </center>
            </div><br>
            <div class="card-body">
            <form action="{{route('auth.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Employee Full Name</label>
                        <input type="text" name="name" class="form-control" value=" " required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Email Adress</label>
                        <input type="email" name="email" class="form-control" value=" " required>
                        @error('email')
                        <div id="passwordError" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Username</label>
                        <input type="text" name="username" class="form-control" value=" " required>
                        @error('username')
                        <div id="passwordError" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Password</label>
                        <input type="password" name="password" class="form-control"  required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Confirm Password</label>
                        <input type="password" name="confirm" class="form-control"  required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Employee Photo</label>
                        <input type="file" name="employee_photo" class="form-control" value="" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Father Name</label>
                        <input type="text" name="father_name" class="form-control" value=" " required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" value=" " required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Phone Number</label>
                        <input type="number" name="phone" class="form-control" value=" " required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label class='form-label'>Present Address</label>
                        <textarea type="text" name="present_address" class="form-control" value=" " required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class='form-label'>Parmanent Address</label>
                        <textarea type="text" name="parmanent_address" class="form-control" value=" " required></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class='form-label'>Gardian Number</label>
                        <input type="number" name="gardian_phone" class="form-control" value=" " required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Gardian Email Address</label>
                        <input type="email" name="gardian_email" class="form-control" value=" " required>
                    </div>
                    <div class="col-md-4">
                        <label class='form-label'>Emargency Contact Number</label>
                        <input type="number" name="emergency_contact_number" class="form-control" value=" " required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var education_count = 1;

            $("#add_education").click(function(){
                education_count++;
                var new_education_row = '<div class="row education_row">';
                new_education_row += '<div class="col-md-3"><label class="form-label">Degree Name</label><input type="text" name="degree_name_'+ education_count +'" class="form-control" value="" required></div>';
                new_education_row += '<div class="col-md-2"><label class="form-label">Year</label><input type="number" name="year_'+ education_count +'" class="form-control" value="" required></div>';
                new_education_row += '<div class="col-md-2"><label class="form-label">GPA</label><input type="text" name="gpa_'+ education_count +'" class="form-control" value="" required></div>';
                new_education_row += '<div class="col-md-4"><label class="form-label">Institute Name</label><input type="text" name="institute_name_'+ education_count +'" class="form-control" value="" required></div>';
                if(education_count > 1) {
                    new_education_row += '<div class="col-md-1"><button type="button" class="btn btn-danger remove_education">X</button></div>';
                }
                new_education_row += '</div><br>';
                $("#education_fields").append(new_education_row);
            });

            $(document).on('click', '.remove_education', function(){
                $(this).closest('.education_row').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            var education_count = 1;

            $("#add_experience").click(function(){
                education_count++;
                var new_education_row = '<div class="row experience_row">';
                new_education_row += ' <div class="col-md-3"><label class="form-label">Company Name</label><input type="text" name="company_name_'+ education_count +'" class="form-control" value=" " required></div>';
                new_education_row += '<div class="col-md-2"><label class="form-label">From</label><input type="text" name="from_'+ education_count +'" class="form-control" value="" required></div>';
                new_education_row += '<div class="col-md-2"><label class="form-label">To</label><input type="text" name="to_'+ education_count +'" class="form-control" value="" required></div>';
                new_education_row += '<div class="col-md-4"><label class="form-label">Designation</label><input type="text" name="designation_'+ education_count +'" class="form-control" value="" required></div>';
                if(education_count > 1) {
                    new_education_row += '<div class="col-md-1"><button type="button" class="btn btn-danger remove_education">X</button></div>';
                }
                new_education_row += '</div><br>';
                $("#experience").append(new_education_row);
            });

            $(document).on('click', '.remove_education', function(){
                $(this).closest('.experience_row').remove();
            });
        });
    </script>

        <script>
            // Wait for the DOM to be fully loaded
            document.addEventListener("DOMContentLoaded", function () {
                // Get the password error message element
                var passwordError = document.getElementById("passwordError");

                // If the password error message element exists
                if (passwordError) {
                    // Hide the password error message after 5 seconds
                    setTimeout(function () {
                        passwordError.style.display = "none";
                    }, 5000); // 5000 milliseconds = 5 seconds
                }
            });
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>