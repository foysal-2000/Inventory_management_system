<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Dashboard - Welcome to IMS Admin Panel </title>

  <!-- Favicons -->
  <link href="{{asset('backend')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('backend')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('backend')}}/https://fonts.gstatic.com" rel="preconnect">
  <link href="{{asset('backend')}}/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" 
    integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="{{asset('backend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('backend')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('backend')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('backend')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('backend')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('backend')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('backend')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('backend')}}/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  @include('backend.layout.navbar')
  <!-- End Header -->
  <main id="main" class="main">
  </main>
  <!-- ======= Sidebar ======= -->
  @include('backend.layout.sidebar')
  <!-- End Sidebar-->
  <main id="main" class="main">
    <div class="content">
        @yield('content')
    </div>

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('backend.layout.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('backend')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('backend')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('backend')}}/assets/js/main.js"></script>

</body>

</html>