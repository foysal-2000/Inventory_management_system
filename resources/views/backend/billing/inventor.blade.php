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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color:gray;
           /* height: 100%;
            overflow-y: hidden;
            */
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
        #CustomerID{
            width: 180px;
            height:50px;
        }
        #searchProduct{
            height:50px;
        }
        .bank{
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
        #clock {
        font-family: Arial, sans-serif;
        font-size: 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
                height="15"
                alt="MDB Logo"
                loading="lazy"
                />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Team</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Projects</a>
                </li>
            </ul>
            <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <!-- Notifications -->
            <div class="dropdown">
                <a
                data-mdb-dropdown-init
                class="text-reset me-3 dropdown-toggle hidden-arrow"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                aria-expanded="false"
                >
                <i class="fas fa-bell"></i>
                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuLink"
                >
                <li>
                    <a class="dropdown-item" href="#">Some news</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Another news</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                </li>
                </ul>
            </div>
            <!-- Avatar -->
            <div class="dropdown">
                <a
                data-mdb-dropdown-init
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                aria-expanded="false"
                >
                <img
                    src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                    class="rounded-circle"
                    height="25"
                    alt="Black and White Portrait of a Man"
                    loading="lazy"
                />
                </a>
                <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
                >
                <li>
                    <a class="dropdown-item" href="#">My profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Logout</a>
                </li>
                </ul>
            </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
        </nav>
<!-- Navbar -->
        <div class="content">
            <div class="row mt-2">
                <div class="col-md-8">
                    <form action="{{ route('backend.inventory.searchProduct') }}" method="post" id="searchForm" class="d-flex">
                                @csrf
                            <input type="text" name="searchProduct" id="searchProduct" class="form-control" placeholder="Search Product by Barcode or Name">
                            <button type="button" class="btn btn-primary" id="searchButton">Search</button>
                            <button type="button" class="btn btn-primary" id="refreshButton">Refresh</button>
                        </form>
                        
                        <div class="col-md-8">
                            <div id="suggestions" class="search-results"></div>    
                        </div>
                
                </div>
            <div class="col-md-4">
               
                
                <label class="text-warning" style="width:125px; height:45px; font-size:20px;" >Customer ID</label>
                <input type="number" name="CustomerID" id="CustomerID" placeholder='+880 Mobile No.'>
                <a href="{{route('backend.productReturn.create')}}" class="btn btn-lg btn-primary"> Go To Return-Product</a>
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
                                <th oninput="calculateTotalPrice()">Total</th>
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
                            <td><input type="number" name="discount" class="discount" id="discount"  readonly></td>
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
                            <td> <input type="number" class="Cashrecevied" name="Cashrecevied" id="CashReceived"  ></td>
                        </tr>
                        <tr>
                            <th class="th">Return Amount</th>
                            <td><input type="number" class="Returnamount" name="Returnamount" id="ReturnAmount"
                                    readonly></td>
                        </tr>
                        <tr>
                            <th class="th">Payment Type</th>
                            <td>
                                <select class="paymenttype" id="paymenttype">
                                    <option>Select One</option>
                                    <option>Cash</option>
                                    <option>Card</option>
                                    <option>Due</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="th">Bank Name</th>
                            <td>
                                <select class="bank" id="bank">
                                    <option>Select One</option>
                                    <option>The City Bank</option>
                                    <option>Dhaka Bank</option>
                                    <option>Islami Bank</option>
                                    <option>Brack Bank</option>
                                    <option>Estern Bank</option>
                                    <option>Standard Chartered Bank</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="content text-center">
                    <button type="button" class="btn btn-primary" id="refresh">Refresh all</button>
                        <button id="btn" class="btn btn-md btn-primary ">Round</button>
                        <button id="printButton" class="btn btn-primary"
                            data-print-url="{{ route('backend.inventory.print') }}">Print Invoice</button>
                        <button id="ReprintInvoice" class="btn btn-primary">Re Print</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Existing HTML and styles -->

<script>
    const bankOptions = {
    'Card': ['The City Bank', 'Dhaka Bank', 'Islami Bank', 'Brack Bank', 'Eastern Bank', 'Standard Chartered Bank']
    // Add more payment types and corresponding bank names if needed
};

   $(document).ready(function () {
    let searchTerm = "";
    let slCounter = 1; 
    let customerID = '';
    let lastInvoiceData = null;
    let totalDiscount = 0;
    // Variable to keep track of SL
   // Generate a random unique ID

    // Listen for input changes in the search bar
    $('#searchProduct').on('input', function () {
    searchTerm = $(this).val();
    const suggestionsDiv = $('#suggestions');
    suggestionsDiv.empty(); // Clear previous suggestions

    // Check if the searchTerm has at least two characters before making the AJAX request
    if (searchTerm.trim().length >= 2) {
        $.ajax({
            url: "{{ route('backend.inventory.searchProduct') }}",
            method: 'POST',
            data: { term: searchTerm, _token: '{{ csrf_token() }}' },
            success: function (data) {
                suggestionsDiv.empty(); // Clear previous suggestions
                data.products.forEach(function (product) {
                    // Check if the suggestion starts with the search term
                    const suggestion = product.label.toLowerCase();
                    const index = suggestion.indexOf(searchTerm.toLowerCase());
                    const matchedText = suggestion.substr(index, searchTerm.length);

                    // Add a suggestion with matched text in a different color
                    const suggestionHTML = suggestion.replace(
                        new RegExp(matchedText, 'i'),
                        `<span class="matched-text">${matchedText}</span>`
                    );

                    suggestionsDiv.append(`<div class="suggestion" data-product-name="${product.label}" data-product-price="${product.value}">${suggestionHTML}</div>`);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
            }
        });
    }
});


    function updateSerialNumbers() {
        $('#invoiceTable tr').each(function (index) {
            $(this).find('td:nth-child(1)').text(index + 1);
        });
    }


    // Handle product suggestion clicks
   // Inside the updateRowTotal function
function updateRowTotal(row) {
    const qtyInput = row.find('input.qty');
    const price = parseFloat(row.find('td:nth-child(3)').text());
    const qty = parseInt(qtyInput.val(), 10);
    const totalPrice = price * qty;
    row.find('td:nth-child(5)').text(totalPrice.toFixed(2)); // Update the Total Price
}

    // Function to update the subtotal
    
    /**** ADD PRODUCT TO TABLE  ******/


    function addProductToInvoice(productName, productPrice) {
    $.ajax({
        url: 'subtract-product-quantity',
        method: 'POST',
        data: { product_name: productName, _token: '{{ csrf_token() }}' },
        success: function (data) {
            // Quantity subtracted successfully
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
        }
    });

    $.ajax({
        url: 'get-product-details',
        method: 'POST',
        data: { product_name: productName, _token: '{{ csrf_token() }}' },
        success: function (data) {
            const productVAT = parseFloat(data.productVAT) || 0;
            const productDiscount = parseFloat(data.discount) || 0;

            // Check if the product is already in the invoice table
            const existingRow = $('#invoiceTable tr').filter(function () {
                return $(this).find('td:nth-child(2)').text() === productName;
            });

            if (existingRow.length > 0) {
                // If the product already exists, update its quantity and discount
                const qtyInput = existingRow.find('input.qty');
                const currentQty = parseInt(qtyInput.val(), 10);
                qtyInput.val(currentQty + 1); // Increment quantity
            } else {
                // If the product is not in the invoice table, add a new row
                const newRow = `
                    <tr>
                        <td>${slCounter}</td>
                        <td>${productName}</td>
                        <td data-discount="${productDiscount}">${productPrice.toFixed(2)}</td>
                        <td><input type="number" class="qty" value="1" min="0" style="background-color: gray; width: 70px;"></td>
                        <td></td>
                        <td><button class="btn btn-sm btn-warning remove">Remove</button></td>
                    </tr>
                `;

                const $newRow = $(newRow);
                $('#invoiceTable').append($newRow);
                updateRowTotal($newRow);
                updateSerialNumbers();
                slCounter++;

                // Update the total VAT
                updateTotalVAT();

                // Update the discount field based on the product discount and quantity
                const discountInput = $('#discount');
                const currentDiscount = parseFloat(discountInput.val()) || 0;
                const newDiscount = currentDiscount + (productDiscount * 1); // Assuming initial quantity is 1
                discountInput.val(newDiscount.toFixed(2));
            }

            $('#searchProduct').val(''); // Clear the search input field
            $('#suggestions').empty();
            updateTotal();
            subtractProductQuantity(productName);
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

   
    // Handle product suggestion clicks
    $('#suggestions').on('click', '.suggestion', function () {
        const productName = $(this).data('product-name');
        const productPrice = parseFloat($(this).data('product-price'));
        addProductToInvoice(productName, productPrice);
        updateTotal();
    });

    function updateTotalVAT() {
        let totalVAT = 0;
        let processedRows = 0;
        const promises = [];

        $('#invoiceTable tr').each(function () {
            const productName = $(this).find('td:nth-child(2)').text();
            const qty = parseInt($(this).find('input.qty').val(), 10);

            const promise = new Promise(function (resolve, reject) {
                $.ajax({
                    url: 'get-product-details', // Adjust the URL as needed
                    method: 'POST',
                    data: { product_name: productName, _token: '{{ csrf_token() }}' },
                    success: function (data) {
                        const productVAT = parseFloat(data.productVAT) || 0;
                        if (!isNaN(qty)) {
                            totalVAT += productVAT * qty;
                        }
                        resolve();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr, status, error);
                        reject();
                    }
                });
            });

            promises.push(promise);
        });

        Promise.all(promises)
            .then(function () {
                $('#vat').val(totalVAT.toFixed(2));
                calculateTotalPrice();
            })
            .catch(function () {
                // Handle errors if needed
            });
    }



    // Listen for Enter key press in the search bar
    $('#searchProduct').on('keydown', function (event) {
        if (event.which === 13) {
            // Enter key pressed
            event.preventDefault(); // Prevent form submission
            const suggestions = $('#suggestions').find('.suggestion');
            if (suggestions.length > 0) {
                const firstSuggestion = suggestions.first();
                const productName = firstSuggestion.data('product-name');
                const productPrice = parseFloat(firstSuggestion.data('product-price'));
                addProductToInvoice(productName, productPrice);
                updateTotal();
            }
        }
       
    });
    function updateDiscountInput(totalDiscount) {
        const discountInput = $('#discount');
        discountInput.val(totalDiscount.toFixed(2));
    }
    // Function to update the total
function updateTotal() {
    let subTotal = 0;
    let totalDiscount = 0; // New variable to store total discount

    $('#invoiceTable tr').each(function () {
        const totalPrice = parseFloat($(this).find('td:nth-child(5)').text());
        const qty = parseInt($(this).find('input.qty').val(), 10);
        const productDiscount = parseFloat($(this).find('td:nth-child(3)').data('discount')) || 0;

        if (!isNaN(totalPrice)) {
            subTotal += totalPrice;

            // Update total discount based on quantity and product discount
            totalDiscount += qty * productDiscount;
        }
    });

    const subTotalInput = $('#subTotal');
    if (!isNaN(subTotal)) {
        subTotalInput.val(subTotal.toFixed(2));
    } else {
        subTotalInput.val('0.00');
    }

    const Payable = subTotal - totalDiscount; // Subtract total discount from subtotal
    $('#Payable').val(isNaN(Payable) ? '0.00' : Payable.toFixed(2));

    calculateReturnAmount();
    updateTotalVAT();
    updateDiscountInput(totalDiscount); // Update discount input field
}



    // Handle quantity changes and remove products with quantity 0
    // Inside the event handler for quantity changes
    $('#invoiceTable').on('input', 'input.qty', function () {
        const $row = $(this).closest('tr');
        const qty = parseInt($(this).val(), 10);

        if (qty === 0) {
            // If quantity is 0, remove the row
            $row.remove();
            updateSerialNumbers();
            updateTotal();
        } else {
            // Update the row total and total discount
            updateRowTotal($row);
            updateTotal();
            updateProductQuantity($row);

        }
    });



    // Handle remove buttons
    $('#invoiceTable').on('click', 'button.remove', function () {
        $(this).closest('tr').remove();
        updateSerialNumbers(); 
        updateTotal();
     
    });

    // Function to update the total
        function calculateTotalPrice() {
        const subTotal = parseFloat($('#subTotal').val()) || 0;
        const vat = parseFloat($('#vat').val()) || 0;
        const discount = parseFloat($('#discount').val()) || 0;
        const total = subTotal + vat - discount;
        $('#Payable').val(total.toFixed(2));
        calculateReturnAmount();
    }

    // Calculate the return amount
    function calculateReturnAmount() {
    const Payable = parseFloat($('#Payable').val()) || 0;
    const cashReceived = parseFloat($('#CashReceived').val()) || 0;
    const returnAmount = cashReceived - Payable;
    const customerID = $('#CustomerID').val();
    const phone = parseFloat(customerID) || 0;
    $('#ReturnAmount').val(returnAmount.toFixed(2));
}



    // Handle cash received input
    $('#CashReceived').on('input', function () {
        calculateReturnAmount();
    });
});


$('#btn').on('click', function () {
        // Get the current Payable amount
        const currentPayable = parseFloat($('#Payable').val()) || 0;

        // Calculate the rounded amount
        const roundedAmount = Math.round(currentPayable);

        // Calculate the difference between the rounded and current Payable
        const difference = roundedAmount - currentPayable;
        // Update the Payable field with the rounded amount
        $('#Payable').val(roundedAmount.toFixed(2));

        // Update the "Rounded" label to show the difference
        $('#rounded').text(difference.toFixed(2));
    });
    // Set the customer ID in the print template



    // Handle the "Refresh" button click
    $('#refresh').on('click', function () {
        // Clear the invoice table
        $('#invoiceTable').empty();

        // Clear other input fields and labels
        $('#subTotal').val('');
        $('#vat').val('');
        $('#discount').val('');
        $('#Payable').val('');
        $('#rounded').text('');
        $('#CashReceived').val('');
        $('#ReturnAmount').val('');
        $('#CustomerID').val('');
        $('#searchProduct').val(''); // Clear the search input field
        $('#suggestions').empty('');
      
    });

/********Date and Time */

    function formatCurrentDateTime() {
        const now = new Date();
        const day = String(now.getDate()).padStart(2, '0');
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const year = now.getFullYear();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM';

        return `${day}-${month}-${year} ${hours}:${minutes} ${ampm}`;
    }

    $('#paymenttype').on('change', function () {
        const selectedPaymentType = $(this).val();
        const bankDropdown = $('#bank');

        // Enable or disable the Bank Name dropdown based on the selected payment type
        if (selectedPaymentType === 'Card') {
            bankDropdown.prop('disabled', false);
        } else {
            bankDropdown.prop('disabled', true);
            bankDropdown.val('Select One'); // Reset the value when disabled
        }

        // Clear existing options
        bankDropdown.empty();

        // Add default option when not "Card"
        if (selectedPaymentType !== 'Card') {
            bankDropdown.append($('<option>', { value: 'Select One', text: 'Select One' }));
        }

        // Add new options based on the selected payment type (if needed)
        const options = bankOptions[selectedPaymentType] || [];
        options.forEach(function (option) {
            bankDropdown.append($('<option>', { value: option, text: option }));
        });
    });
/****  invoice print  */

$('#printButton').on('click', function () {
    // Create a new table for the invoice
    const uniqueID = Math.floor(10000 + Math.random() * 90000);
    subtractProductQuantitiesFromDatabase();
    
    let invoiceTable = `
        <table border="0" cellpadding="3" style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
    `;

    // ... (rest of your code)
        // Iterate through each row in the current table and add it to the invoice
        $('#invoiceTable tr').each(function () {
        const sl = $(this).find('td:nth-child(1)').text();
        const productName = $(this).find('td:nth-child(2)').text();
        const price = $(this).find('td:nth-child(3)').text();
        const qty = $(this).find('input.qty').val();
        const total = $(this).find('td:nth-child(5)').text();
    

        invoiceTable += `
            <tr>
                <td>${sl}</td>
                <td>${productName}</td>
                <td>${price}</td>
                <td>${qty}</td>
                <td>${total}</td>
            </tr>
        `;
    });

    // Complete the invoice table and calculate the rest of the values
    invoiceTable += `

        </tbody>
        </table>
        <div>---------------------------------------------------------------------------------------------------------------------------------------</div>
        <table style="margin-left: 320px;">
            <tr>
                 <th>Sub Total</th>
                 <th>:</th>
                 <td class="m">${$('#subTotal').val()}</td>
            </tr>
            <tr>
                 <th>VAT (5%)</th>
                 <th>:</th>
                 <td>${$('#vat').val()}</td>
            </tr>
            <tr>
                 <th>Discount</th>
                 <th>:</th>
                 <td>${$('#discount').val()}</td>
            </tr>
            
            <tr>
                 <th>Rounding</th>
                 <th>:</th>
                 <td>${$('#rounded').text()}</td>
            </tr>
            <tr>
                 <th>Payable</th>
                 <th>:</th>
                 <td>${$('#Payable').val()}</td>
            </tr>
            <tr>
                 <th>Cash Received</th>
                 <th>:</th>
                 <td>${$('#CashReceived').val()}</td>
            </tr>
            <tr>
                 <th>Return Amount</th>
                 <th>:</th>
                 <td>${$('#ReturnAmount').val()}</td>
            </tr>
            <tr>
                 <th>Payment Type</th>
                 <th>:</th>
                 <td>${$('.paymenttype').val()}</td>
            </tr>
        </table>
    `;


    // Create a new window to display the invoice
    const printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write(`
        <html>
            <head>
                <title>Invoice</title>
                <style>
                    /* Center the invoice table on the page */
                    table {
                        margin: 0 auto;
                    }
                    /* Center the outer div on the printed page */
                    div {
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div>
                    <h1>SHAWPNO</h1>
                    <p>D-092 Uttara Rabindra Sarani Outlet</p>
                    <p>Plot No-1, Road NO, 15, sector-3, Uttara R/A, Dhaka-1230</p>
                    <p>------------------------------------RETAIL INVOICE-----------------------------------</p>
                    <p>Invoice No.: <span id="uniqueID">${uniqueID}</span> Customer ID: <span id="printedCustomerID"></span></p>
                    <p>Cashier:&emsp;{{auth()->user()->first_name}} &emsp; Date: <span id="currentDateTime"></span></p>
                    <p>------------------------------------------------------------------------------------------</p>
                    ${invoiceTable}
                    <p>-------------------------------------------------------------------------------------------</p>
                    <p> Thank You For Shopping</p>
                </div>
            </body>
            </html>
    `);
    printWindow.document.close();
    const customerID = $('#CustomerID').val();
    printWindow.document.getElementById('printedCustomerID').textContent = customerID;

    /********Date and Time */
    // Call formatCurrentDateTime to get the formatted date and time
    const currentDateTime = formatCurrentDateTime();

    // Update the date and time elements in your invoice template
    printWindow.document.getElementById('currentDateTime').textContent = currentDateTime;

    function formatCurrentDateTime() {
    const now = new Date();
    const day = String(now.getDate()).padStart(2, '0');
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const year = now.getFullYear();
    let hours = now.getHours();
    let ampm = 'AM';

    if (hours >= 12) {
        ampm = 'PM';
        if (hours > 12) {
            hours -= 12;
        }
    } else if (hours === 0) {
        hours = 12; // Midnight (12:00 AM)
    }

    const minutes = String(now.getMinutes()).padStart(2, '0');

    return `${day}-${month}-${year} ${hours}:${minutes} ${ampm}`;
    }

    // Function to print the invoice after the print dialog is closed
    function printInvoice() {
        printWindow.print();
        printWindow.close();
    }

    // Attach an event listener to call printInvoice() when the print dialog is closed
    if (printWindow.matchMedia) {
        printWindow.matchMedia('print').addListener(function (mql) {
            if (!mql.matches) {
                // Print dialog is closed
                printInvoice();
            }
        });
    }

    // Delay the call to print until after the print dialog is closed
    setTimeout(function () {
        printInvoice();
    }, 10); 


    const invoiceItems = [];
    $('#invoiceTable tr').each(function () {
        const productName = $(this).find('td:nth-child(2)').text();
        const price = $(this).find('td:nth-child(3)').text();
        const qty = parseInt($(this).find('input.qty').val(), 10);
        const total = parseFloat($(this).find('td:nth-child(5)').text());
        const customerID = $('#CustomerID').val();
 

        if (!isNaN(qty) && qty > 0 && customerID !== undefined && customerID !== null) {
            const unitPrice = parseFloat(price);
            invoiceItems.push({ product_name:productName, unit_price:unitPrice, quantity:qty, total_price:total, phone:customerID});
        } 
    });

    // Other invoice-related variables
    const invoiceNo = $('#uniqueID').text();
    const phone = $('#CustomerID').val();
    const cashier = '{{ auth()->user()->first_name }}';
    const subTotal = parseFloat($('#subTotal').val());
    const vat = parseFloat($('#vat').val());
    const discount = parseFloat($('#discount').val());
    const payable = parseFloat($('#Payable').val());
    const cashReceived = parseFloat($('#CashReceived').val());
    const returnAmount = parseFloat($('#ReturnAmount').val());
    const paymentType = $('.paymenttype').val();
    const selectedBank = $('#bank').val();

    // Prepare the data to send to the server
    // Prepare the data to send to the server
    const invoiceData = {
        invoiceNo:uniqueID,
        phone,
        cashier,
        invoiceItems,
        subTotal,
        vat,
        discount,
        payable,
        cashReceived,
        returnAmount,
        paymentType,
        selectedBank,
    };

    // Get the CSRF token from the meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Send the invoice data to the server using AJAX
    $.ajax({
        url: "save-invoice",
        method: 'POST',
        data:invoiceData,
        headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
        },
        success: function (data) {
            // Handle the success response
            if (data.success) {
                // Invoice data saved successfully
                console.log('Invoice data saved to the database.');
            } else {
                // Handle any errors from the server
                console.error('Error while saving invoice data:', data.error);
            }
        },
        error: function (xhr, status, error) {
            // Handle AJAX request errors
            console.error(xhr, status, error);
        }
    });
     

    function updateProductQuantity($row) {
        const productName = $row.find('td:nth-child(2)').text();
        const qty = parseInt($row.find('input.qty').val(), 10);
        if (!isNaN(qty) && qty > 0) {
            $.ajax({
                url: 'subtract-product-quantity',
                method: 'POST',
                data: { product_name: productName, quantity: qty, _token: '{{ csrf_token() }}' },
                success: function (data) {
                    // Quantity updated successfully
                },
                error: function (xhr, status, error) {
                    console.error(xhr, status, error);
                }
            });
        }
       
    }
    

    // Function to subtract product quantities from the database when printing the invoice
    function subtractProductQuantitiesFromDatabase() {
        $('#invoiceTable tr').each(function () {
            const productName = $(this).find('td:nth-child(2)').text();
            const qty = parseInt($(this).find('input.qty').val(), 10);
            if (!isNaN(qty) && qty > 0) {
                updateProductQuantity($(this));
            }
        });
        
    }

// After printing the invoice
function calculateAndInsertProfit() {
    // Iterate through each row in the invoice table
    $('#invoiceTable tr').each(function () {
        const productName = $(this).find('td:nth-child(2)').text();
        const qty = parseInt($(this).find('input.qty').val(), 10);
        const totalPrice = parseFloat($(this).find('td:nth-child(5)').text());
        const customerID = $('#CustomerID').val();
        // Make an AJAX request to fetch the purchase price from the database for the product
        $.ajax({
            url: "{{route('get-purchase-price')}}", // Adjust the URL as needed
            method: 'POST',
            data: { product_name: productName, _token: '{{ csrf_token() }}' },
            success: function (data) {
                const purchasePrice = parseFloat(data.purchasePrice);

                // Calculate the profit for this product
                const profit = (totalPrice - (purchasePrice * qty)).toFixed(2);

                // Insert the profit data into the Profit table
                $.ajax({
                    url: 'insert-profit', // Adjust the URL as needed
                    method: 'POST',
                    data: {
                        invoice_id: uniqueID, // Get the invoice ID or pass it from your code
                        product_name: productName,
                        profit: profit,
                        customer_id: customerID,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        console.log('profit data saved to the database.');
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
            }
        });
    });
}

// Call the calculateAndInsertProfit function after printing the invoice
calculateAndInsertProfit();

    lastInvoiceData = printWindow.document.documentElement.innerHTML;

        // Clear the invoice table and input fields
        $('#invoiceTable').empty();
        $('#subTotal').val('');
        $('#vat').val('');
        $('#discount').val('');
        $('#Payable').val('');
        $('#rounded').text('');
        $('#CashReceived').val('');
        $('#ReturnAmount').val('');
        slCounter = 1;
    });

    // Handle the "Reprint" button click
    $('#ReprintInvoice').on('click', function () {
        if (lastInvoiceData) {
            // Create a new window to reprint the invoice
            const reprintWindow = window.open('', '_blank');
            reprintWindow.document.open();
            reprintWindow.document.write(lastInvoiceData);
            reprintWindow.document.close();

            // Function to print the reprint after the print dialog is closed
            function printReprint() {
                reprintWindow.print();
                reprintWindow.close();
            }

            // Attach an event listener to call printReprint() when the print dialog is closed
            if (reprintWindow.matchMedia) {
                reprintWindow.matchMedia('print').addListener(function (mql) {
                    if (!mql.matches) {
                        // Print dialog is closed
                        printReprint();
                    }
                });
            }

            // Delay the call to printReprint until after the print dialog is closed
            setTimeout(function () {
                printReprint();
            }, 10); // Adjust the delay as needed
        } else {
            alert('No previous invoice data available for reprint.');
        } 
       
            $('#invoiceTable').empty();
            // ... (rest of your code)
            // Clear other input fields and labels
            $('#subTotal').val('');
            $('#vat').val('');
            $('#discount').val('');
            $('#Payable').val('');
            $('#rounded').text('');
            $('#CashReceived').val('');
            $('#ReturnAmount').val('');
            $('#CustomerID').val(''); 
            slCounter = 1;    
});
</script>
</body>
</html>
