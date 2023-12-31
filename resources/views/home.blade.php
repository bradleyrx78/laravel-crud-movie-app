@extends('layouts.app')

@section('content')
    <h1>Movie List</h1>
    @unless (count($movie))
        <p>No movie currently available</p>
    @endunless

    <div class="row">
        @if (count($movie))
            @foreach ($movie as $movies)
            <div class="col-md-3 pt-5">
                <div class="card">
                    <img src="{{ asset('/public/images/movies/'.$movies->image)}}" height ="450"class="card-image-top">
                    <div class="card-body">
                        <h3><a href ="{{ route('movies.show', $movies->id) }}">{{ $movies->title }}</a></h3>
                        <div class="text-danger">
                            @for ($i = 1; $i <= $movies->rating_star; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <p>{{ Str::limit($movies->description, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>        

@endsection