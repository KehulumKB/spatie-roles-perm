<?php

namespace App\Livewire;

use Livewire\Component;

class EditRole extends Component
{
     public $id;
    public $role;

    public function editRole()
    {
        $this->validate([
            'role' => 'required',
        ]);

        try {
            $role = \Spatie\Permission\Models\Role::find($this->id);
            $role->name = $this->role;
            $role->save();
            session()->flash('message', 'Role updated successfully');
            return $this->redirect('/manage-role', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Role already exists');
            return $this->redirect('/manage-role', navigate: true);
        }
    }

    public function mount($id)
    {
        $this->id = $id;
        $role = \Spatie\Permission\Models\Role::find($id);
        $this->role = $role->name;
    }

    public function render()
    {
        return view('livewire.edit-role');
    }
}
