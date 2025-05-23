@extends('customer.navbar')

@section('title', 'Post')

@section('content')

<style>
    .ctn {
        display: flex;
        justify-content: center;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .editNews{
        background-image: url('/storage/other_images/Oceanic.jpg');
        background-size: 100%;
    }

    .left-section{
        flex: 2;
        margin-right: 20px;
    }

    .right-section{
        flex: 3;
        margin-left: 20px;
    }

    .editNews-container{
        color: whitesmoke;
        text-align: center;
        padding:40px;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
    }

    .bold-line {
        display: block;
        width: 300px;
        height: 5px;
        background-color: whitesmoke;
        margin: 20px auto;
    }

    .btn {
        background-color: #003366;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3 ease;
    }

    .btn:hover{
        background-color: #2c92c4;
    }

    .card-header, .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .card-header {
        font-size: 2.5rem;
        font-weight: bold;
        background-color: #003366;
        color: whitesmoke;
    }

    .btn-container{
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .error{
        text-align: justify;
    }
</style>

<div class="editNews">
    <div class="editNews-container">
        <h1>Input News</h1>
        <div class="bold-line"></div>
    </div>

    <div class="container ctn">
        <div class="col-md-6">
            <div class="card mt-5 mb-5 justify-content-center" style="min-height:500px">
                <div class="card-header">Add News</div>
                <div class="card-body pt-3">
                    <form action="/input-news" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">Choose Picture:</label>
                                <input type="file" id="image" name="image" accept="image/*" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please choose picture to upload.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" id="title" name="title" placeholder="Masukkan Judul" class="form-control" required>
                                <div class="invalid-feedback">
                                    Title must not empty.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="content" class="form-label">Text:</label>
                                <textarea id="content" name="content" rows="4" placeholder="Masukkan Isi Teks" class="form-control" required></textarea>
                                <div class="invalid-feedback">
                                    Text must not empty.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="author" class="form-label">Author name:</label>
                                <input type="text" id="author" name="author" placeholder="Masukkan Nama Author" class="form-control" required>
                                <div class="invalid-feedback">
                                    Author name must not empty.
                                </div>
                            </div>
                        </div>

                        <div class="btn-congtainer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@section('scripts')
<script>
    // Bootstrap 5 custom validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('form')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection

@endsection
