@extends('layouts.app')

@section('content')
    <div class="card my-5">
        <img src="{{ asset('/storage/images/movies/'.$movie->image)}}" width="360"class="card-image-top">
        <div class="card-body">
            <h1 class="m-2">{{ $movie->title }}</h1>
            <div class="text-danger m-2">
                @for ($i = 1; $i <= $movie->rating_star; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>
            <p class="m-2">{{ $movie->description }}</p>
        </div>
    </div>

@include('review.show')
@endsection

