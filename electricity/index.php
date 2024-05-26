<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #e3f2fd;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.1);
        }
        .container {
    max-width: 600px;
    margin: 100px auto; /* Increased top margin */
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
    position: relative; /* Ensures container is above the video */
}

        h1 {
            font-size: 28px;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #0d6efd;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #0a58ca;
        }

        .result {
            padding: 15px 0;
            font-size: 22px;
            color: #198754;
            text-align: center;
        }

        .table-container {
            margin-top: 20px;
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .payment-card {
            margin-top: 20px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .form-check-input {
            margin-top: 6px;
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-success:hover {
            background-color: #157347;
            border-color: #157347;
        }
    </style>
</head>

<body>
<video autoplay muted loop id="myVideo" style="position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%; z-index: -100;">
    <source src="image.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
    <div class="container">
    
        <h1>Electricity Bill Calculator</h1>
        <form id="electricityForm">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="name">Enter your Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-sm-6">
                    <label for="units">Enter Units Consumed:</label>
                    <input type="number" class="form-control" id="units" name="units" min="0" required>
                </div>
                <div class="col-12">
                    <label for="address">Enter your address:</label>
                    <input type="text" class="form-control" id="address" name="address" min="10" required>
                </div>
            </div>
            <div class="text-center">
                <br><br>
                <button type="submit" class="btn btn-primary">Calculate Bill</button>
            </div>
        </form>
        <div class="result"></div>
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Bill Amount (Rs)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table data will be populated dynamically after form submission -->
                </tbody>
            </table>
        </div>

        <!-- ... Your existing container content ... -->
        <div class="text-center">
            <!-- <button type="submit" class="btn btn-primary" id="calculateBill">Calculate Bill</button> -->
            <button type="button" class="btn btn-success" id="proceedToPayment" style="display: none;">Proceed To
                Payment</button>
        </div>
        <div class="payment-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Choose Payment Option</h5>
                    <form id="paymentForm">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="creditCard"
                                value="creditCard" checked>
                            <label class="form-check-label" for="creditCard">
                                Credit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="debitCard"
                                value="debitCard">
                            <label class="form-check-label" for="debitCard">
                                Debit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="netBanking"
                                value="netBanking">
                            <label class="form-check-label" for="netBanking">
                                Net Banking
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentOption" id="upi" value="upi">
                            <label class="form-check-label" for="upi">
                                UPI
                            </label>
                        </div>
                        <div class="payment-bycard" style="display: none;">
                            <!-- Credit/Debit Card Payment -->
                            <div class="form-group mt-3">
                                <label for="cardNumber">Card Number:</label>
                                <input type="number" class="form-control" id="cardNumber" name="cardNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="expiryDate">Expiry Date:</label>
                                <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" required>
                            </div>
                        </div>
                        <div class="payment-bynetbanking" style="display: none;">
                            <!-- Net Banking Payment -->
                            <div class="form-group">
                                <label for="username">User Name:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="payment-byupi" style="display: none;">
                            <!-- UPI Payment -->
                            <div class="form-group">
                                <label for="upiId">UPI ID:</label>
                                <input type="text" class="form-control" id="upiId" name="upiId" required>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#electricityForm").submit(function (event) {
                event.preventDefault();
                const formData = $(this).serialize();
                $.post("bill.php", formData, function (data) {
                    const name = $("#name").val();
                    const address = $("#address").val();

                    $(".result").text("Electricity Bill Amount: Rs. " + data);
                    $(".table-container tbody").html(`<tr><td>${name}</td><td>${address}</td><td>${data}</td></tr>`);
                    $(".table-container").show();
                    $("#proceedToPayment").show();
                })
                .fail(function(xhr, status, error) {
                    console.error("AJAX request failed with status:", status, "and error:", error);
                });
            });

            $("#proceedToPayment").click(function () {
                $(".payment-card").show();
            });


            $('input[type="radio"][name="paymentOption"]').change(function () {
                // Hide all payment sections first
                $(".payment-bycard, .payment-bynetbanking, .payment-byupi").hide();

                // Show the selected payment section
                const selectedOption = $(this).val();
                if (selectedOption === "creditCard" || selectedOption === "debitCard") {
                    $(".payment-bycard").show();
                } else if (selectedOption === "netBanking") {
                    $(".payment-bynetbanking").show();
                } else if (selectedOption === "upi") {
                    $(".payment-byupi").show();
                }
            });

            $("#paymentForm").submit(function (event) {
                event.preventDefault();
                // Process payment logic can be added here
                alert("Payment Successful! Thank you for your payment.");
            });
        });
    </script>
</body>

</html>
