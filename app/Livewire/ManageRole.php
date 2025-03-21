<?php

namespace App\Livewire;

use Livewire\Component;

class ManageRole extends Component
{
    public function render()
    {
        return view('livewire.manage-role', [
             'roles' => \Spatie\Permission\Models\Role::all()
        ]);
    }
}
