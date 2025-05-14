<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('category')->paginate(6); // 6 film per halaman

        return view('homepage', [
            'movies' => $movies,
            'currentPage' => $movies->currentPage(),
            'lastPage' => $movies->lastPage(),
        ]);
    }
    public function show($id)
    {
    $movie = Movie::with('category')->findOrFail($id);
    //dd($movie);
    return view('movie_detail', compact('movie'));
    }

    public function create()
    {
    $categories = Category::all();
    return view('movie_form', compact('categories'));
    }



}
