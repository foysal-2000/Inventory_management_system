@extends('backend.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" 
integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  .container{
    margin-top:-180px;
  }
  .card{
    width: 400px;
    height: 200px;
    background-color:D4FF33;
  }
  .mb-0{
    font-size:30px;
  }
</style>
<table  class="table table-bordered display" hidden>
            <thead>
                <tr>
                    
                    <th>Payment Type</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1;
                    $totaldue = 0;
                @endphp
                @foreach($datas as $inventory)
                <tr>
                    
                    <td>{{$inventory->paymentType}}</td>
                </tr>
                @if($inventory->paymentType == 'Due')
                    @php 
                        $totaldue += $inventory->payable;
                    @endphp
                @endif
                @endforeach
            </tbody>
        </table>
<div class="table" hidden>
  <tr>
    <th>name</th>
  </tr>
  @php
      $totalPayable= 0;
  @endphp
  @foreach($datas as $data)
  <tr>
    <td>{{$data->payable}}</td>

  </tr>
      @php
          $totalPayable += (float)$data->payable;
      @endphp
  @endforeach

  <td>{{$totalPayable}}</td>
</div><br>

<div class="table" hidden>
  <tr>
    <th>name</th>
  </tr>
  @php
      $totalpurchase= 0;
  @endphp
  @foreach($dss as $data)
  <tr>
    <td>{{$data->purchase_price}}</td>

  </tr>
      @php
          $totalpurchase += (float)$data->purchase_price;
      @endphp
  @endforeach

  <td>{{$totalpurchase}}</td>
</div><br>
<div class="table" hidden>
  <tr>
    <th>name</th>
  </tr>
  @php
      $totalprofits= 0;
  @endphp
  @foreach($profits as $data)
  <tr>
    <td>{{$data->profit}}</td>

  </tr>
      @php
          $totalprofits += (float)$data->profit;
      @endphp
  @endforeach

  <td>{{$totalprofits}}</td>
</div><br>

<div class="table" hidden>
  <tr>
    <th>name</th>
  </tr>
  @php
      $totalprofits= 0;
  @endphp
  @foreach($profits as $data)
  <tr>
    <td>{{$data->profit}}</td>

  </tr>
      @php
          $totalprofits += (float)$data->profit;
      @endphp
  @endforeach

  <td>{{$totalprofits}}</td>
</div><br>
@can('all')
<div class="container">
  <h2 id="message">Welcome to Dashboard! {{ auth()->user()->name }}</h2>
  <script>
      // Function to hide the message after 5 seconds
      setTimeout(function() {
          document.getElementById('message').style.display = 'none';
      }, 5000); // 5000 milliseconds = 5 seconds
  </script>

  <div class="row"> <!-- Center the card horizontally -->
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="filter" style="position: absolute; top: 10px; right: 10px;">  
        </div>

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Sales</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-dollar-sign"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$total_sales}}</h6> <!-- Fix text size -->
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="filter" style="position: absolute; top: 10px; right: 10px;"> <!-- Position filter to top right -->
        </div>

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Products</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-box-open"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$products}}</h6> <!-- Fix text size -->
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="filter" style="position: absolute; top: 10px; right: 10px;"> <!-- Position filter to top right -->
         
        </div>

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Customer</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{ $customers}}</h6> <!-- Fix text size -->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="row"> <!-- Center the card horizontally -->
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="filter" style="position: absolute; top: 10px; right: 10px;"> <!-- Position filter to top right -->
        </div>

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Sales Amount </h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-bangladeshi-taka-sign"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$totalPayable}}</h6> <!-- Fix text size -->
            
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="filter" style="position: absolute; top: 10px; right: 10px;"> <!-- Position filter to top right -->
        </div>

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Purchase Amount</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-dollar-sign"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$totalpurchase}}</h6> <!-- Fix text size -->
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="filter" style="position: absolute; top: 10px; right: 10px;"> <!-- Position filter to top right -->
        </div>

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Profit Amount</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
            <i class="fa-solid fa-bangladeshi-taka-sign"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$totalprofits}}</h6> <!-- Fix text size -->
              
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="row"> <!-- Center the card horizontally -->
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Employee</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
            <i class="fa-solid fa-users"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$user}}</h6> <!-- Fix text size -->
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Due</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-bangladeshi-taka-sign"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$totaldue }}</h6> <!-- Fix text size -->
              
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="card-body text-center"> <!-- Center align the content -->
          <h5 class="card-title mb-0">Total Supplier</h5> <!-- Fix title size -->

          <div class="d-flex align-items-center justify-content-center mt-3"> <!-- Center align items -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 2rem;"> <!-- Increase icon size -->
              <i class="fa-solid fa-user-group"></i>
            </div>
            <div class="ps-3">
              <h6 class="mb-0">{{$suppiers}}</h6> <!-- Fix text size -->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endcan
@endsection
