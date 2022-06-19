<?php

namespace App\Http\Controllers;

use App\ViewModels\MovieShowViewModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies  = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=0e11156e246541a290af2ce95ccea6a5')
            ->json()['results'];
        $nowPlaying = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=0e11156e246541a290af2ce95ccea6a5&language=en-US&page=1')->json()['results'];


        $genres  = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=0e11156e246541a290af2ce95ccea6a5')->json()['genres'];


        $viewModel = new MoviesViewModel(
           $popularMovies,
           $nowPlaying,
           $genres
        );

       return view('movies.index',  $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=0e11156e246541a290af2ce95ccea6a5&append_to_response=credits,videos,images')
        ->json();


        $viewModel = new MovieShowViewModel(
            $show,
        );

        return view('movies.show',$viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
