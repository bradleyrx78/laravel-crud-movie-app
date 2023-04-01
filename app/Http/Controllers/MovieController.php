<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $movie = Movie::all();
        return view('movie.index', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'rating_star' => 'required',
            'description' => 'required'
        ]);
           
        $movie = Movie::create($request->all());

        return redirect()->route('movies.index', $movie->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {   
        return view('movie.update', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie = Movie::find($movie->id);
        $movie-> title = $request -> input('title');
        $movie-> image = $request -> input('image');
        $movie-> description = $request -> input('description');
        $movie-> rating_star = $request -> input('rating_star');
        $movie-> update();
        return redirect()->route('movies.show', $movie->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {   
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
