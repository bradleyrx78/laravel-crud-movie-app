<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Facade;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Movie $movie )
    {   
        $request->validate([
            'review' => 'required'
        ]); 

        $user_id = FacadesAuth::user()->id;
        $movie_id = $movie->id;

        $existing_review = Review::where([
            'user_id' => $user_id,
            'movie_id' => $movie_id
        ])->first();

        if ($existing_review) {
            return back();
        }

        $review = Review::create([
            'user_id' => $user_id,
            'movie_id' => $movie_id,
            'content' => $request->review,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('review.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'content' => $request->review,
        ]);

        Review::find($review->id)->update(['content' => $request->review]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if($review->user->id !== FacadesAuth::user()->id && !FacadesAuth::user()->isAdmin){
            abort(403);
        }
        $review->delete();
        return redirect()->back();
    }
}
