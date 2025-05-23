<link rel="stylesheet" href="resources\css\style.css">
@extends('customer.navbar')

@section('title', 'Home')

@section('content')

<style>
  .navbar {
    position: relative;
    z-index: 1;
  }

  .jbg {
    background-image: url('/storage/other_images/sampah-laut2.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 550px;
    padding: 0;
    margin: 0;
  }

  .jumbotron h3 {
    font-size: 2rem;
  }

  .jumbotron p {
    font-size: 1rem;
  }

  .card-container h3 {
    font-size: 1.5rem;
  }

  .card-container p {
    font-size: 1rem;
  }

  .card-container{
    margin-top: 40px;
    display: flex;
    flex-wrap: wrap;
  }

  .bold-line {
    display: block;
    width: 150px;
    height: 5px;
    background-color: white;
    margin: 20px auto;
  }

  .card {
    margin-bottom: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }

  .card img {
    border-bottom: 1px solid #ddd;
    object-fit: cover;
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 15px;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
  }

  .card-title {
    font-size: 1.75rem;
    margin-bottom: 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .card-text {
    font-size: 1rem;
    text-align: justify;
    color: #777;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
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

  .row {
    display: flex;
    align-items: stretch;
  }

  .col-md-4, .col-md-8{
    display: flex;
    flex-direction: column;
  }

  .ocean{
    background-image: url('/storage/other_images/ocean.jpg');
    background-size: 100%;
    height: 500px;
  }

  .hero-section {
    color: white;
    text-align: center;
    align-items: center;
    padding: 100px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
    box-sizing: border-box;
  }

  .hero-section h1 {
    font-size: 3rem;
    margin-bottom: 20px;
  }
  .hero-section p {
    font-size: 1.5rem;
    margin-bottom: 30px;
  }

  @media (max-width: 767.8px) {
    {}

    .jumbotron h3 {
      font-size: 2.25rem;
    }

    .jumbotron p {
      font-size: 1.25rem;
    }

    .hero-section {
      padding: 50px;
    }

    .hero-section h1 {
      font-size: 2rem;
    }
    .hero-section p {
      font-size: 1rem;
    }

  }

  @media (min-width: 768px) {
    {}

    .jumbotron h3 {
      font-size: 3rem;
    }

    .jumbotron p {
      font-size: 1.5rem;
    }

    .card-container{
      flex-direction: row;
    }

    .card-container h3 {
      font-size: 2rem;
    }

    .card-container p {
      font-size: 1.25rem;
    }

    .card {
      display: flex;
      flex-direction: row;
      width: 100%;
    }

    .card-img{
      width: 40%;
      height: auto;
    }

    .card-body{
      flex:1;
      padding: 20px;
    }

  }

  @media (min-width: 1200px) {
    {}

    .jumbotron h3 {
      font-size: 3.5rem;
    }

    .jumbotron p {
      font-size: 1.5rem;
    }

    .card-container{
      flex-direction: column;
    }

    .card-container h3 {
      font-size: 2.5rem;
    }

    .card-container p {
      font-size: 1.5rem;
    }

    .card {
      display: block;
      width: 100%;
    }

    .card-img{
      width: 100%;
    }

    .card-body{
      padding: 15px;
    }

    .col-md-4 img{
      height: 365px;
    }

  }


</style>

{{-- Jumbotron --}}
<div class="jumbotron jbg text-white position-relative">
  <div class="carousel-item active">
    <div class="carousel-container">
      <div class="isi d-flex align-items-center flex-column pt-5">
        <h3 class="display-3 fw-bold pt-3" style="text-align: center;">
          Save Our Oceans <br> Join the Fight Against Plastic Pollution
        </h3>
        <div class="container" style="max-width: 1000px">
          <p class="lead pt-3 fw-bold" style="text-align: center; font-weight: 1.5rem;">
            Every year, millions of tons of plastic waste end up in our oceans, endangering marine life and ecosystems.
            Together, we can make a difference - reduce plastic use, support clean-up efforts, and advocate for sustainable practices.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- end jumbotron --}}

<section style="background-color: #003366;">
  <div class="container">
    <h1 class="text-center mb-4 pt-5 pb-3 fw-bold text-white">Latest News</h1>
    <div class="bold-line"></div>
    <div class="card-container">
      @foreach ($news as $new)
        <div class="card shadow-sm">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{ $new->image }}" class="img img-fluid rounded-start" alt="Image not available">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title text-primary">{{ $new->judul }}</h5>
                <p class="card-text">Author: {{ $new->author }}</p>
                <p class="card-text text-muted">{{ file_get_contents($new->isi) }}</p>
                <a href="#" class="btn btn-outline-primary">Read More</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
      {{ $news->links() }}
    </div>
    <div class="pb-5"></div>
  </div>
</section>

<div class="ocean">
  <div class= "container-sm">
    <div class="hero-section mb-5">
      <h1 class="fw-bold">
          Discover DeepIntoOcean
      </h1>
      <p class="fw-bold">
      The ocean, a vibrant ecosystem full of life, is under threat from plastic pollution.
      Use our interactive map to explore real-time data on plastic waste in different regions,
      understand its impact, and discover how you can help protect marine life and coastal communities.
      Dive in and be part of the solution!
      </p>
      <a class="card-button btn fw-bold" href="/ocean">
        Explore the Ocean
      </a>
    </div>
  </div>
</div>

@endsection
