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
        return view('admin.movielist', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('admin.uploadmovie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'rating_star' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();
        if($request->hasFile('image')){
            
            $destination_path = 'public/images/movies';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;

        }
           
        Movie::create($input);
        return redirect()->route('admin.index');
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
        return view('admin.editmovie', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {

        $request->validate([
            'title' => 'required',
            'rating_star' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();
        if($request->hasFile('image')) {
            
            $destination_path = 'public/images/movies';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->move($destination_path, $image_name);

            $input['image'] = $image_name;

        }else{
            unset($input['image']);
        }

        Movie::find($movie->id)->update($input);
        return redirect()->route('admin.showmovie', $movie->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {   
        $movie->delete();
        return redirect()->route('admin.indexmovie');
    }

    public function showAdminMovie(Movie $movie){
        return view('admin.showmovie', compact('movie'));
    }

    public function showAdminList(){

        $movie = Movie::all();
        return view('admin.movielist', compact('movie'));
    }


}
