<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Respondent;

class UserSearch extends Component
{

    public $search = "";

    public function render()
    {
        $results = [];

        if(strlen($this->search) >= 2) {
            $results = [];

            if (strlen($this->search) >= 2) { 
                $results = Respondent::where(function ($query) {
                    $query->where('firstname', 'like', '%' . $this->search . '%')
                        ->orWhere('lastname', 'like', '%' . $this->search . '%')
                        ->orWhere('middle_name', 'like', '%' . $this->search . '%');
                })
                ->whereNotNull('email') // Add this condition to filter by non-null email
                ->where('email', '!=', '') // Add this condition to filter out empty email strings
                ->limit(5) // Limit the number of results for performance
                ->get();
            }
            // $results = Respondent::where('firstname', 'like', '%'.$this->search.'%')->limit(10)->get();
        }

        return view('livewire.user-search', ['results' => $results]);
    }
}
