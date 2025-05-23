@extends('customer.navbar')

@section('title', 'Donate')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Donate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007BA7;
        }

        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .receipt {
            background-image: url('/storage/other_images/Donation.png');
            background-size: 100%;
        }

        .btn {
            padding: 10px 20px; 
            border: 1px solid #ccc; 
            cursor: pointer; 
        }

        .card {
            border-radius: 50px;
            border: none;
            margin-bottom: 2rem;
            padding: 2rem;
        }

        .donation-container {
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center;
            height: 100%;
            width: 100%;
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
        
        .receipt-container { 
            max-width: 600px; 
            margin: 50px auto; 
            padding: 20px; 
            border: 1px solid #ddd; 
            border-radius: 10px; 
            background-color: #e0f7fa; 
        } 
        
        .receipt-header { 
            text-align: center; 
            margin-bottom: 20px; 
        } 
        
        .receipt-header img { 
            width: 50px; 
        } 
        
        .receipt-details { 
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end; 
        } 
        
        .receipt-details p { 
            margin: 0; 
            display: flex;
            justify-content: space-between;
            width: 100%;
        } 
        
        .receipt-footer { 
            text-align: center; 
            font-size: 0.9em; 
            color: #555; 
        }

        .receipt-value{
            margin-left: auto;
        }

    </style>
</head>

<body>
    <div class="receipt">
        <div class="donation-container pb-5">
            <div class="receipt-container" id="receiptView"> 
                <div class="receipt-header"> 
                    <h1>DeepIntoOcean</h1> 
                    <img class="" src="storage/other_images/logo.png" alt="icon" style="width: 200px; height: auto;">
                    <br>
                    <h2><strong>RP <span>{{ number_format($donate->jumlah, 0, ',', '.') }}</span></strong></h2>
                    <h4><strong>Method: <span>{{$donate->method}}</span></strong></h>
                </div> 
                <div class="receipt-details"> 
                    <p><strong>Status:</strong> <span class="receipt-value">Success</span></p> 
                    <p><strong>Date:</strong> <span class="receipt-value" id="current-date"></span></p> 
                    <p><strong>Time:</strong> <span class="receipt-value" id="current-time"></span></p>
                    <p><strong>User ID:</strong> <span class="receipt-value">{{$donate->user_id}}</span></p> </div>
                <div class="receipt-footer">
                    <p>Screenshot this page and use it as proof of transaction completion. <br>Thank you for your generous donation!</p>
                </div>
            </div>
            <a href="/donate" class="btn btn-primary btn-block">Back to Donation Page</a>
        </div>
    </div>

    <script> document.addEventListener('DOMContentLoaded', function () { 
        let currentDate = new Date(); 
        let formattedDate = currentDate.toLocaleDateString(); 
        let formattedTime = currentDate.toLocaleTimeString(); 
        document.getElementById('current-date').innerText = formattedDate; 
        document.getElementById('current-time').innerText = formattedTime; 
        }); 
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
