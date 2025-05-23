@extends('navbar')

@section('title', 'News')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<style>
    .search-input { 
        border-radius: 25px; 
        border: 1px solid #ccc; 
        padding: 10px 20px; 
        width: 100%; 
        max-width: 500px; 
        display: inline-block;
    } 
    
    .search-button { 
        border-radius: 25px; 
        background-color: #5bc0de; 
        color: white; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
        width: auto;
    }

    .search-container { 
        text-align: center; 
        padding: 20px 10px;
    }

    .newest {
        background-image: url('/storage/other_images/News.jpeg');    
        background-size: 100%;
        background-repeat: repeat;
        padding: 0;
        margin: 0;
    }

    .hover-effect:hover {
        color: #2c92c4 !important;
        background-color: #ffffff; /* Blue background */
        transition: all 0.3s ease-in-out;
    }

    .btn.active {
        color: #2c92c4 !important;
        background-color: #fff;
    }

    .btn {
        background-color: #003366;
        color: white  !important;
        position: relative;
        z-index: 1;
    }

    .pagination .page-item .page-link{
        color: #ffffff;
        background-color: #003366;
        border: 1px solid #003366;
    }

    .pagination .page-item.active .page-link{
        background-color: #2c92c4;
        border-color: #2c92c4;
    }

    .pagination .page-item .page-link:hover{
        background-color: #2c92c4;
        border-color: #2c92c4;
    }

    
    .news-container{
        color: whitesmoke;
        text-align: center;
        padding:50px;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
    }

    .list-section { 
        display: flex; 
        flex-wrap: wrap; 
        justify-content: space-between;
    }

    .list-section .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 500px;
        flex: 0 1 calc(33.333% - 20px); 
        margin: 10px 10px;
    }

    .list-section .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .list-section .card img {
        border-bottom: 1px solid #ddd;
        width: 100%;
        min-height: 250px;
        object-fit: cover;
        max-height: 250px;
    }

    .list-section .card-body {
        padding: 15px;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .list-section .card-title {
        font-size: 1.25rem;
        margin-bottom: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: center;
    }

    .list-section .card-text {
        font-size: 1rem;
        text-align: justify;
        color: #777;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box; 
        -webkit-line-clamp: 5; 
        -webkit-box-orient: vertical;
    }

    @media (max-width: 767.98px) {
        {}

        .list-section { 
            display: flex; 
            flex-wrap: wrap; 
            justify-content: center;
            margin-bottom: 10px;
        }

        .search-input{
            max-width: 80%;
        }

        .search-button{
            padding: 10px 0;
            width: 70px;
        }

        .list-section .card{
            height:auto;
            flex: 0 1 calc(100% - 20px);
        }

        .list-section .card img{
            min-height: 200px;
            max-height: 200px;
        }

        .list-section .card-title{
            font-size: 1.25rem;
        }

        .list-section .card-text{
            -webkit-line-clamp: 3;
        }
    }

    @media (min-width: 768px) and (max-width: 1099.98px){
        {}

        .search-input{
            max-width: 80%;
        }

        .search-button{
            padding: 10px 0;
            width: 70px;
        }

        .list-section .card{
            height:auto;
            flex: 0 1 calc(50% - 20px);
        }

        .list-section .card img{
            min-height: 200px;
            max-height: 200px;
        }

        .list-section .card-title{
            font-size: 1.25rem;
        }

        .list-section .card-text{
            -webkit-line-clamp: 3;
        }
    }

    @media (min-width:1100px) {
        {}
        .list-section .card{
            flex: 0 1 calc(33.333%-20px);
            height: auto;
        }
        .newest {
            background-repeat: repeat;
            padding: 0;
            margin: 0;
        }
    }

</style>

<section>
    <div class="page-title container position-relative fixed" style="background-color: #003366; min-width: 100%">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="mb-4 display-5 text-center" style="font-size: 40px; font-weight: 700; margin-bottom: 10px; color: white;"><strong>News</strong></h2>
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
        </div>
    </div>

    <div class="newest">
        <div class="container">
            <div class="news-container pt-5 mb-5 search-container">
                <h4>Search News</h4>
                <form method="POST" action="/news" class="php-email-form">
                    @csrf
                    <div class="input-group justify-content-center">
                        <input class="search-input" type="text" id="search" name="search" placeholder="Enter item name or keyword" required>
                        <button class="search-button" type="submit" value="Search">Search</button>
                    </div>
                </form>
            </div>
            @if ($news == null)
            <p class="text-secondary mb-5 text-center lead fs-4">There is no news available</p>
            @endif

            <div class="list-section pt-5">
                @foreach ($news as $new)
                    <div class="card">
                        <img src="{{ $new->image }}" class="card-img-top" alt="{{ $new->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $new->judul }}</h5>
                            <p class="card-text">{{ file_get_contents($new->isi) }}</p>
                            <a href="/news/{{$new->id}}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</section>
    
@endsection
