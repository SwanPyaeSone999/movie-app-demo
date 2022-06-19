<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowsViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $popular  = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=0e11156e246541a290af2ce95ccea6a5')
                    ->json()['results'];
        $topRated  = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=0e11156e246541a290af2ce95ccea6a5')
                    ->json()['results'];

        $genres  = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=0e11156e246541a290af2ce95ccea6a5')
                    ->json()['genres'];

        $viewModel = new TvShowsViewModel(
            $popular,
            $topRated,
            $genres
        );
        return view('tvshows.index',$viewModel);
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

        $show = Http::get('https://api.themoviedb.org/3/tv/'.$id.'?api_key=0e11156e246541a290af2ce95ccea6a5&append_to_response=credits,videos,images')
        ->json();

        $viewModel = new TvShowViewModel(
            $show,
        );
        return view('tvshows.show',$viewModel);
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
