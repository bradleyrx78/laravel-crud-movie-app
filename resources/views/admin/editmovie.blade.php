@extends('adminlte::page')

@section('title', 'Edit Form')

@section('content')
    <div class="card my-5">
        <div class="card-body m-5">
            <h1>Edit movie information</h1>
            <img src="{{ asset('/storage/images/movies/'.$movie->image)}}" class="card-image-top">

            <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="mt-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" value="{{ $movie->image }}">
                </div>

                <div class="form-group">
                    <label>Rating Star</label>   
                    <input type="text" class="form-control" name="rating_star" value="{{ $movie->rating_star }}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows=10>{{ $movie->description }}</textarea >
                </div>
                <button type="submit" class="btn btn-primary mt-2 float-left">Update</button>
            </form>

            <form action="{{ route('movies.show' , $movie->id) }}" class="mt-3">
                <button type="submit" class="btn btn-primary mt-2 float-left">Cancel</button>
            </form>
        </div>

       
    </div>

@endsection