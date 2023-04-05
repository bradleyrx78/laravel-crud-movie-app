@extends('adminlte::page')

@section('title', 'uu')

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

            <form action={{ route('movies.edit', $movie->id) }}>
                <button type="submit" class="btn btn-link text-danger">Update</button>
            </form>

            <form action={{ route('movies.delete', $movie->id) }} method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link text-danger">Delete</button>
            </form>

        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('movies.reviews.store', $movie->id)}}" method="POST">
                @csrf
                <input type="text" name="review" class="form-control" placeholder="Write your review">
                <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <h2 class="m-2">Reviews</h2>
        <ul class = "list-group list-group-flush">
            <div class="card-body">
                @foreach ( $movie->reviews as $review)
                    <li class="list-group-item">
                        <b>{{ $review->user->name }} : </b>{{ $review->content }}
                        <form action="{{ route('movies.reviews.destroy', $review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>

@endsection