@extends('navbar')

@section('title', 'Donate')

@section('content')
<style>
    :root {
        --primary-color: #007BA7;
    }

    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    .donate {
        background-image: url('/storage/other_images/Donation.png');    
        background-size: 100%;
        background-repeat: no-repeat;
        height: auto;
        padding: 0;
        margin: 0;
    }

    .donation-container {
        text-align: center;
        padding: 30px;
        background-color: rgba(0, 0, 0, 0.6);
        height: 100vh;
    }

    .donate-container {
        text-align: center;
        padding: 20px;
    }

    .donation-container h1 {
        font-size: 2.5rem;
        color: #F5F5DC;
    }

    .highlight {
        font-weight: bold;
        color: var(--primary-color);
    }

    .hover-effect:hover {
        color: #2c92c4 !important;
        background-color: #ffffff; 
        transition: all 0.3s ease-in-out;
    }

    .btn.active {
        color: #2c92c4 !important;
        background-color: #fff;
    }

    .btn {
        background-color: #003366;
        color: white !important;
        position: relative;
        z-index: 1;
        font-size: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    @media (max-width: 767.98px) {
        {}
        .btn {
            font-size: 1rem; 
            width: 75%; 
            height: 50px;
            margin-top: 1rem;
        }

        .donation-container h1 {
            font-size: 1.5rem;
        }

        .donation-container{
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 49vh;
        }
    }

    @media (min-width: 768px) {
        {}
        .btn {
            font-size: 1.8rem; 
            width: 100%; 
            height: 100px;
            margin-top: 2.5rem;
        }

        .donation-container h1 {
            font-size: 2.75rem;
        }

        .donation-container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
    </style>
<div class="donate jbg text-white position-relative">
    <div class="donation-container">
        <div class="donate-container" id="donate"> 
            <h1><strong></strong> If you want to access this feature<br>please join become our member</h1> 
            <a href="/login" class="btn btn-primary btn-block">Join Member</a>
        </div>
    </div>
</div>
@endsection
