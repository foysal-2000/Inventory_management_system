<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #28a745;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      width: 300px;
    }
  </style>
  <title>Login Page</title>
</head>
<body>
  @error('category')
      <div class="text-danger">{{ $message }}</div>
  @enderror
  <div class="card bg-light">
    <div class="card-body">
      <h5 class="card-title text-center">Login</h5>
      <form action="{{route('backend.admin.authenticate')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="username"><i class="fas fa-user"></i> Username</label>
          <input type="text" class="form-control" name='username' id="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
          <label for="password"><i class="fas fa-lock"></i> Password</label>
          <input type="password" class="form-control" name='password' id="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-success btn-block">Login</button>
      </form>
    </div>
  </div>

  <!-- Font Awesome Icons (you may need to include the Font Awesome library) -->
  <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>
