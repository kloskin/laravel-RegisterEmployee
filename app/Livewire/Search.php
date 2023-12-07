<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{

    public $search='';
    public function render()
    {
        $employees = [];
        if ($this->search) {
            $employees = User::where('email', 'like', '%' . $this->search . '%')
                ->orWhere('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->get();
        }

        return view('livewire.search',[
            'employees'=>$employees,
        ]);
    }
}
