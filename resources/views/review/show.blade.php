@include('review.owner')
@include('review.create')
@include('review.edit')
<div class="card mt-3">
    <div class="card-header">
        <h2 class="m-2">Reviews</h2>
    </div>
    <ul class = "list-group list-group-flush">
        <div class="card-body">
            @foreach ( $movie->reviews->where('user_id', '<>', auth()->id()) as $review )
                <li class="list-group-item">
                    <b>{{ $review->user->name }} : </b>{{ $review->content }}
                </li>
            @endforeach
        </div>
    </ul>
</div>

