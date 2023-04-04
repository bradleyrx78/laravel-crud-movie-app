<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Review;
use App\Models\Movie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        
        Review::create([
            'user_id' => FacadesAuth::user()->id,
            'movie_id' => $movie->id,
            'content' => $request->review
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if($review->user->id !== FacadesAuth::user()->id){
            abort(501);
        }
        $review->delete();
        return redirect()->back();
    }
}
