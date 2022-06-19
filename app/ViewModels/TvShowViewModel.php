<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $show;

    public function __construct($show)
    {
        $this->show = $show;
    }


    public function show()
    {
        return collect($this->show)->merge(
            [
                'poster_path'  => 'https://image.tmdb.org/t/p/w500/'. $this->show['poster_path'],
                'vote_average' => $this->show['vote_average'] * 10 .'%',
                'first_air_date' => Carbon::parse($this->show['first_air_date'])->format('M d,Y'),
                'genres' =>   collect($this->show['genres'])->pluck('name')->flatten()->implode(', '),
                'crew' =>   collect($this->show['credits']['crew'])->take(2),
                'cast' =>   collect($this->show['credits']['cast'])->take(5),
                'images' =>   collect($this->show['images']['backdrops'])->take(6),
                'production_companies' => $this->show['production_companies'][0]['name'],
            ]
        )->only([
            'poster_path','id','genre_ids','name','vote_average','overview','first_air_date','genres','credits',
            'videos','images','crew','cast','runtime','original_language','production_companies','number_of_seasons','number_of_episodes'
        ]);
    }



}
