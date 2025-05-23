@extends('navbar')

@section('title', 'Register')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .register {
        background-image: url('/storage/other_images/deepocean.jpeg');
        background-size: 100%;
    }

    .register-section {
        text-align: center;
        padding: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-section img, .register-section .card {
        border-bottom: 1px solid #ddd;
        object-fit: cover;
        border-radius: 15px;
        height: 500px;
    }

    .register-section img {
        width: 430px;
    }

    .card-header, .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card-body {
        padding-top: 1.5rem;
    }

    .card-header {
        font-size: 2.5rem;
        font-weight: bold;
        background-color: #003366;
        color: whitesmoke;
    }

    .button {
        padding-top: 1.5rem;
    }

    .btn {
        background-color: #003366;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn:hover {
        background-color: #2c92c4;
    }

    .alter {
        margin-top: 3rem;
    }

    .int {
        margin-bottom: 1rem;
    }

@media (max-width: 767.98px) {
    {}
    .register-section {
        flex-direction: row;
        justify-content: center;
        align-items: stretch;
        padding: 45px 10px;
    }

    .row.no-gutters {
        display: flex;
        flex-wrap: nowrap;
        margin: 0;
        padding: 0;
    }

    .row.no-gutters .col-md-6 {
        flex: 1;
        max-width: 50%;
        padding: 0;
    }

    .register-section img,
    .register-section .card {
        height: 450px;
        width: 100%;
        margin: 0;
    }

    .register-section img {
        width: 110%;
        height: 100%;
        border-right: none;
    }

    .card {
        width: 100%;
        height: 100%;
        border-left: none;
    }

    .card-header {
        font-size: 1.25rem;
    }

    .card-body {
        padding-top: 20px;
        font-size: 75%;
    }

    .form-group {
        height: 75%;
    }

    .btn {
        font-size: 0.8rem;
        padding: 8px 15px;
        width: 80%;
    }

    .alter {
        margin-top: 10px;
    }

    .button {
        padding-top: 0.5rem;
    }

    .int {
        margin-bottom: 1rem;
    }
}
</style>
<div class="register">
    <div class="container register-section">
        <div class="row no-gutters">
            <div class="col-md-6">
                <img src="/storage/other_images/login.jpeg" alt="Register page">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form action="/regist" method="POST" class="form-horizontal">
                            @csrf
                            <div class="int">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="int">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="int">
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="button mb-0">
                                <button type="submit" class="btn btn-primary" style="background-color: #1F509A; color: white; width: 200px;">Register</button>
                            </div>
                        </form>
                        <div class="form-group alter">
                            <p>Already have account? Login <a href="/login" title="Go to the login page">Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
