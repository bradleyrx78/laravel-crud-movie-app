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
            /*
            if ($request->hasFile('image')){
                $file =$request->file('image');
                $extension = $file->getClientOriginalExtension;
                $filename = time() . '.' . $extension;
                $file->move('uploads/imgsource/', $filename);
                $imgsource->image = $filename;
            }else {
                return $request;
                $imgsource->image = '';
            }
            $imgsource->save();
            */

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
