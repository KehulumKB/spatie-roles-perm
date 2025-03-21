<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AddPermission extends Component
{
    public $permission;

    public function addPermission()
    {
       $this->validate([
           'permission' => 'required'
       ]);

       try {
           Permission::create(['name' => $this->permission]);
           session()->flash('message', 'Permission added successfully');
           
           $this->reset('permission');
        return $this->redirect('/manage-permission', navigate: true);
       } catch (\Exception $e) {
           session()->flash('error', 'Permission already exists');
            return $this->redirect('/manage-permission', navigate: true);
       }
    }

    public function render()
    {
        return view('livewire.add-permission');
    }
}
