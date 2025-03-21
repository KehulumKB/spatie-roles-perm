<?php

namespace App\Livewire;

use Livewire\Component;

class ManageUser extends Component
{
    public function render()
    {
        return view('livewire.manage-user', [
            'users' => \App\Models\User::all()
        ]);
    }
}
