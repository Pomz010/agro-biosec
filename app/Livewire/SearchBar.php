<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Respondent;

class SearchBar extends Component
{
    public $search = "";

    public function render()
    {
        $results = [];

        if(strlen($this->search) >= 1) {
            $results = Respondent::where('firstname', 'like', '%'.$this->search.'%')->limit(10)->get();
        }

        return view('livewire.search-bar', ['results' => $results]);
    }
}
