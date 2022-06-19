<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = '';


    public function render()
    {
        $searchResults = [];
        if(strlen($this->search) >= 2){
            $searchResults =  Http::get('https://api.themoviedb.org/3/search/movie?api_key=0e11156e246541a290af2ce95ccea6a5&query='.$this->search)->json()['results'];
        }

        $searchResults = collect($searchResults)->take(7);

        return view('livewire.search-dropdown',compact('searchResults'));
    }
}
