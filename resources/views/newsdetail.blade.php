@extends('navbar')

@section('title', 'post')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center"> 
        <div class="col-md-10 col-lg-10"> 
            <div class="card-body text-justified"> 
                <h1 class="mb-4" style="text-align:justify;">{{ $news->judul }}</h1>
                <img src="{{ asset($news->image) }}" alt="News Image" class="img-fluid rounded mb-4 mx-auto d-block" style="max-height: 300px; object-fit: cover;">
                <div class="d-flex" style="gap:20px;">
                    <p class="text-muted">Author: {{ $news->author }}</p>
                    <p class="text-muted">Publish Date: {{ $news->created_at}}</p>
                </div>
                <div class="content" style="text-align:justify;">
                    {!! nl2br(e(file_get_contents($news->isi))) !!}
                </div>
            </div>
        </div>
   </div>
</div>
@endsection
