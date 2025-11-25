<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';
    public $users;

    public function render()
    {

        if ($this->searchTerm == '') {
            $this->users = array();
        } else {
            $result = User::search($this->searchTerm)->get();
            $this->users = $result;
        }

        return view('livewire.search');
    }
}
