<?php

namespace App\Livewire;

use Livewire\Component;

class DeletePermission extends Component
{
    public $permission;

    public function mount($id)
    {
        try {
            $permission = \Spatie\Permission\Models\Permission::find($id);
            $permission->delete();

            session()->flash('message', 'Permission deleted successfully');
            return $this->redirect('/manage-permission', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Permission does not exist');
            return $this->redirect('/manage-permission', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.delete-permission');
    }
}
