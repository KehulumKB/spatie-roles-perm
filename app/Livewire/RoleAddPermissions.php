<?php

namespace App\Livewire;

use Livewire\Component;

class RoleAddPermissions extends Component
{
    public $id;
    public $role;
    public $permissions;
    public $selectedPermissions = [];

    public function givePermissionTo()
    {
        // $permission = \Spatie\Permission\Models\Permission::findById($permissionId);
        // $this->role->givePermissionTo($permission);

        $this->validate([
            'selectedPermissions' => 'required|array|min:1',
        ]);

        try {
            $this->role->syncPermissions($this->selectedPermissions);

            session()->flash('message', 'Pemissions assigned to Role successfully');
            return $this->redirect('/manage-role', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Unable to assign permissions to Role' . $e->getMessage());
            return $this->redirect('/manage-role', navigate: true);
        }
    }

    public function mount($id)
    {
        $this->id = $id;
        $this->role = \Spatie\Permission\Models\Role::findById($id);

        if (!$this->role) {
            dd('Role not found for ID: ' . $id);
        }

        $this->permissions = \Spatie\Permission\Models\Permission::all();
    }
    
    public function render()
    {
        return view('livewire.role-add-permissions');
    }
}
