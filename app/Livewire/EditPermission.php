<?php

namespace App\Livewire;

use Livewire\Component;

class EditPermission extends Component
{
    public $id;
    public $permission;

    public function editPermission()
    {
        $this->validate([
            'permission' => 'required',
        ]);

        try {
            $permission = \Spatie\Permission\Models\Permission::find($this->id);
            $permission->name = $this->permission;
            $permission->save();
            session()->flash('message', 'Permission updated successfully');
            return $this->redirect('/manage-permission', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Permission already exists');
            return $this->redirect('/manage-permission', navigate: true);
        }
    }

    public function mount($id)
    {
        $this->id = $id;
        $permission = \Spatie\Permission\Models\Permission::find($id);
        $this->permission = $permission->name;
    }

    public function render()
    {
        return view('livewire.edit-permission');
    }
}
