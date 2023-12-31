<div class="modal fade" id="createadminreview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Post a Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form action="{{ route('movies.reviews.store', $movie->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="review" class="form-control" placeholder="Write your review">
                <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>  
            </form>
        </div>

      </div>
    </div>
</div>


<div class="modal fade" id="editadminreview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            @foreach ( $movie->reviews as $review )
              <form action="{{ route('movies.reviews.update', $review->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="review" class="form-control" placeholder="Update your review">
                <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>  
              </form>
            @endforeach
           
        </div>

      </div>
    </div>
</div>

