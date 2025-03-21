<?php

namespace App\Livewire;

use Livewire\Component;

class RoleUpdatePermissions extends Component
{
    public $role;
    public $permissions;
    public $selectedPermissions = [];

    public function givePermissionTo()
    {
        dd("Hello");
        // $permission = \Spatie\Permission\Models\Permission::findById($permissionId);
        // $this->role->givePermissionTo($permission);
    }

    public function mount()
    {
        $this->role = \Spatie\Permission\Models\Role::findById(request()->id);
        $this->permissions = \Spatie\Permission\Models\Permission::all();
    }
    
    public function render()
    {
        return view('livewire.role-update-permissions');
    }
}
