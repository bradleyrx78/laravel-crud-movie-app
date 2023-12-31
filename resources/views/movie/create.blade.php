@extends('layouts.app')

@section('content')
    <div class="card my-5">
        <div class="card-body m-5">
            <h1>Upload new movie</h1>
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label>Rating Star</label>   
                    <input type="text" class="form-control" name="rating_star">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows=10></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2 float-left">Submit</button>
            </form>
        </div>

       
    </div>

@endsection