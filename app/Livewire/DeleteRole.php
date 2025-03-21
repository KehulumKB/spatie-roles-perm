<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteRole extends Component
{
    public $role;

    public function mount($id)
    {
        try {
            $role = \Spatie\Permission\Models\Role::find($id);
            $role->delete();

            session()->flash('message', 'Role deleted successfully');
            return $this->redirect('/manage-role', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Role does not exist');
            return $this->redirect('/manage-role', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.delete-role');
    }
}
