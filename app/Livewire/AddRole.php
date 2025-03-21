<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddRole extends Component
{
    public $role;

    public function addRole()
    {
       $this->validate([
           'role' => 'required'
       ]);

       try {
           Role::create(['name' => $this->role]);
           session()->flash('message', 'Role added successfully');

           $this->reset('role');
        return $this->redirect('/manage-role', navigate: true);
       } catch (\Exception $e) {
           session()->flash('error', 'role already exists');
            return $this->redirect('/manage-role', navigate: true);
       }
    }

    public function render()
    {
        return view('livewire.add-role');
    }
}
