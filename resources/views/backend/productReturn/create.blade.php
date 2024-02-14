<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <title>Invoice</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color:gray;
        }

        .header {
            text-align: center;
        }

        table {
            width: auto;
            border-collapse: collapse;
            background-color:gray;
            

        }

        table, th, td {
            border: 1px solid #000;
            padding: 5px;
            color:white;
            background-color:gray;
        }

        th, td {
            white-space: nowrap;
            color:white;
            background-color:gray;
        }

        .discount {
            margin-top: 10px;
        }

        #refreshButton {
            margin-left: 10px;
        }

        .content {
            margin: 20px;
        }

        .qty {
            width: 70px;
            color: none;
            border: none;
        }

        .table-container {
            max-height: 300px;
            overflow-y: auto;
        }

        content {
            margin-left: 20px;
            margin-right: 20px;
        }

        .vertical-hr {
            margin-left: 20px;
            width: 2px;
            height: 800px;
            background-color: black;
            transform: rotate(180deg);
        }

        .total {
            margin-top: 5px;
            width: 200px;
            height: 30px;
            color: black;
            font-size: 20px;
            border-radius: 1;
        }

        .col-md-3 {
            margin-left: -4%;
            border: #000;
            background-color: gray;
        }

        .subtotal {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border: none;
            width: auto;
            background-color: gray;
            color:yellow;
        }

        .vat {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border: none;
            background-color: gray;
            color:yellow;
        }

        .discount {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border: none;
            background-color: gray;
            color:yellow;
        }

        .Payable {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border: none;
            background-color: gray;
            color:yellow;
        }

        .Cashrecevied {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border: none;
            background-color: gray;
            color:yellow;
        }

        .Returnamount {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border: none;
            background-color: gray;
            color:yellow;
        }

        .paymenttype {
            margin-left: -10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            width: 100%;
            height: 30px;
            border: none;
            background-color: gray;
            color:yellow;
        }

        .th {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            
        }

        #btn {
            margin-left: 0px;
            width: 70px;
        }
        #rounded {
            width: 250px;
            font-weight: bold;
            font-size: 20px;
            text-align:center;
        }
        .search-results {
            position: absolute;
            background-color: white;
            max-height: 200px;
            overflow-y: auto;
            width: 100%;
            z-index: 1;
            
            font-size:15px;
        }

        .search-results .suggestion {
            padding: 5px;
            cursor: pointer;
            
            
        }
        .search-results .suggestion:hover {
            background-color: #00FF00;
        }
        
        .table-container {
            max-height: 600px; 
            width:500px;
            
        }
        .navbar {
            background-color: #CC99FF;
            width: 100%;
            height: 100px;
             
        }
        #InvoiceNO{
            width: 200px;
            height:50px;
        }
        #searchProduct{
            height:50px;
        }
        .form-label{
            color:yellow;
            font-weight:bold;
            font-size:20px;
        }
        .form{
            height:40px;
        }
    </style>
</head>

<body>
        <div class="content">
            <div class="row mt-2">
                <div class="col-md-8">
                    <form action="{{route('backend.productReturn.search')}}" method="post" id="searchForm" class="d-flex">
                         @csrf
                        <input type="text" class="form-control" name="CustomerID" id="CustomerID" placeholder='+880 Mobile No. or Invoice Number'>
                        <button type="button" class="btn btn-primary" id="searchButton">Search</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <a href="{{route('backend.inventory.billing')}}" class="btn btn-md btn-primary">Go To Billing</a>
                    <label class="form-label" id="InvoiceNO">Invoice Number</label>
                    <input type="number" class="form" id="invoice_no_show" readonly>
                </div>

            </div>
           
        </div>
        <br>

        <div class="content">
            <div class="row">
                <div class="col-md-8 table-container">
                    <table class="table table-bordered table-striped table-sm table-fit-content">
                        <thead class="text-center">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" id="invoiceTable">

                        </tbody>

                    </table>
                </div>
                
                <div class="col-md-1">
                    <hr class="vertical-hr">
                </div>
                <div class="col-md-3">
                    <table class="table">
                        <tr>
                            <th class="th">Sub Total Amount</th>
                            <td><input type="number" name="subTotal" class="subtotal" id="subTotal" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th class="th">VAT (5%)</th>
                            <td><input type="number" name="vat" class="vat" id="vat" readonly></td>
                        </tr>

                        <tr>
                            <th class="th">Discount</th>
                            <td>
                                <input type="number" name="discount" class="discount" id="discount" readonly >
                            </td>
                        </tr>
                        <tr>
                            <th class="th">Payable</th>
                            <td><input type="number" class="Payable" name="Payable" id="Payable" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th class="th">Rounding</th>
                            <td>
                                <label class="text-center" id="rounded"></label>
                            </td>
                        </tr>
                        <tr>
                            <th class="th">Cash Received</th>
                            <td> <input type="number" class="Cashrecevied" name="Cashrecevied" id="CashReceived" readonly ></td>
                        </tr>
                        <tr>
                            <th class="th">Return Amount</th>
                            <td><input type="number" class="Returnamount" name="Returnamount" id="ReturnAmount"
                                    readonly></td>
                        </tr>
                        <tr>
                            <th class="th">Payment Type</th>
                            <td>
                                <select class="paymenttype" id="paymentType">
                                    <option>Select one</option>
                                    <option>Cash</option>
                                    <option>Card</option>
                                    <option>Due</option>
                                </select>
                            </td>
                       
                    </table>
                    <div class="content text-center">
                        <button id="returnproduct" class="btn btn-primary"
                            data-print-url="{{ route('backend.inventory.billing') }}">Return-Product</button> 
                            <button type="button" class="btn btn-primary" id="refreshAll">Refresh All</button>   
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script>
    $(document).ready(function () {
        // Search button click event
        $('#searchButton').click(function () {
            var customerId = $('#CustomerID').val();

            // Perform an AJAX request to fetch invoice data based on both Customer ID and Invoice number
            $.ajax({
                type: 'POST',
                url: '{{ route("backend.productReturn.search") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    CustomerID: customerId,
                    InvoiceNo: customerId // Pass the entered value as Invoice number as well
                },
                success: function (response) {
                    if (response.success) {
                        // Populate the invoice table with the fetched data
                        populateInvoiceTable(response.data);
                    } else {
                        alert('By this invoice number or customer id no data is found');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        // Function to populate the invoice table
        // Function to populate the invoice table
        function populateInvoiceTable(data) {
            $('#invoiceTable').empty(); // Clear existing table data

            // Loop through the fetched data and append rows to the table
            $.each(data, function (index, item) {
                var row = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + item.product_name + '</td>' +
                    '<td>' + item.unit_price + '</td>' +
                    '<td>' + item.quantity + '</td>' +
                    '<td>' + item.total_price + '</td>' +
                    "<td><button type='button' class='btn btn-danger Remove'>Remove</button></td>" +
                    '</tr>';

                $('#invoiceTable').append(row);
            });

            // Update other fields like Subtotal, VAT, Discount, etc. based on the fetched data
            $('#subTotal').val(data[0].subTotal);
            $('#vat').val(data[0].vat);
            $('#discount').val(data[0].discount);
            $('#Payable').val(data[0].payable);
            $('#CashReceived').val(data[0].cashReceived);
            $('#ReturnAmount').val(data[0].returnAmount);
            
            // Set the value of the invoice number input field
            $('#invoice_no_show').val(data[0].invoiceNo);

            // Check if the paymentType is defined in the data before setting it
            if (data[0].paymentType !== undefined) {
                $('#paymentType').val(data[0].paymentType);
            }
        }


        // Click event for the Remove button
        $(document).on('click', '.Remove', function () {
            // Get the product name from the corresponding row
            var productName = $(this).closest('tr').find('td:eq(1)').text().trim();

            // Remove the corresponding row from the table
            $(this).closest('tr').remove();
        });


        $('#returnproduct').click(function () {
            var customerId = $('#CustomerID').val();

            // Perform an AJAX request to delete the invoice and its items
                $.ajax({
                    type: 'POST',
                    url: '{{ route("return.product") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        CustomerID: customerId
                    },
                    success: function (response) {
                        if (response.success) {
                            // Provide feedback to the user (e.g., alert or update UI)
                            alert('Invoice and related items deleted successfully');
                            // You may want to redirect or perform additional actions here
                        } else {
                            alert('Error: ' + response.error);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route("delete.profits.by.invoice.id") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        invoice_id: customerId,
                        customer_id: customerId, 
                        
                    },
                    success: function (response) {
                        if (response.success) {
                            // Provide feedback to the user (e.g., alert or update UI)
                            //alert('Profits deleted successfully');
                            // You may want to redirect or perform additional actions here
                        } else {
                            alert('Error: ' + response.error);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
        });

        $('#returnproduct').click(function () {
        // Clear the form or reset the necessary input fields
        $('#searchForm')[0].reset(); // Assuming 'searchForm' is the form ID

        // Clear the invoice table
        $('#invoiceTable').empty();

        // Clear other fields like Subtotal, VAT, Discount, etc.
        $('#subTotal').val('');
        $('#vat').val('');
        $('#discount').val('');
        $('#Payable').val('');
        $('#CashReceived').val('');
        $('#ReturnAmount').val('');
        $('#paymentType').val(''); // Assuming 'paymentType' is the select element ID
        $('#invoice_no_show').val('');
        // Optional: Clear any additional fields or perform other actions as needed
    });
    $('#refreshAll').click(function () {
        // Clear the form or reset the necessary input fields
        $('#searchForm')[0].reset(); // Assuming 'searchForm' is the form ID

        // Clear the invoice table
        $('#invoiceTable').empty();

        // Clear other fields like Subtotal, VAT, Discount, etc.
        $('#subTotal').val('');
        $('#vat').val('');
        $('#discount').val('');
        $('#Payable').val('');
        $('#CashReceived').val('');
        $('#ReturnAmount').val('');
        $('#paymentType').val(''); // Assuming 'paymentType' is the select element ID
        $('#invoice_no_show').val('');
        // Optional: Clear any additional fields or perform other actions as needed
    });

    });
</script>







</body>
</html>
