<div class="card mt-3">
    @if(count($movie->reviews->where('user_id', auth()->id())) > 0)
        <div class="card-header">
            <h2 class="m-2">Your Review</h2>
        </div>
        <ul class = "list-group list-group-flush">
            <div class="card-body">
                @foreach ( $movie->reviews->where('user_id', auth()->id()) as $review)
                    <li class="list-group-item">
                        <b>{{ $review->user->name }} : </b>{{ $review->content }}
                        <div>
                            <button type="submit" class="btn btn-outline-success mt-2" for="danger-outlined" data-bs-toggle="modal" data-bs-target="#editreview">Update</button>
                        </div>
                        <form action="{{ route('movies.reviews.destroy', $review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger mt-2" for="danger-outlined">Delete</button>
                        </form>
                    </li>
                @endforeach
            </div>
        </ul>
    @else
        <div class="container">
            <button type="submit" class="btn btn-outline-primary mt-2" for="success-outlined" data-bs-toggle="modal" data-bs-target="#writereview">Write your review</button>
        </div>
    @endif
</div>

