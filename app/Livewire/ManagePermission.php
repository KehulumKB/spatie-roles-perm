<?php

namespace App\Livewire;

use Livewire\Component;

class ManagePermission extends Component
{
    public function render()
    {
        return view('livewire.manage-permission', [
            'permissions' => \Spatie\Permission\Models\Permission::all()
        ]);
    }
}
