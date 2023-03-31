@extends('layouts.app')

@section('content')
    <div class="card mx-auto">
        <img src="{{ $movie->image }}" class="card-image-top"
        <div class="card-body">
            <h1 class="m-2">{{ $movie->title }}</h1>
            <div class="text-danger m-2">
                @for ($i = 1; $i <= $movie->rating_star; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>
            <p class="m-2">{{ $movie->description }}</p>
        </div>

        <div class="card-body mt-4">
            <h3>Reviews</h3>
            <form action="{{ route('reviews.store', $movie->id)}}" method="POST">
                @csrf
                <input type="text" name="review" class="form-control" placeholder="Write your review">
                <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>
            </form>
        </div>
    </div>

@endsection