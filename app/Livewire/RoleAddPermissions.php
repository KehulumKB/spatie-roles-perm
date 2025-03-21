<?php

namespace App\Livewire;

use session;
use Livewire\Component;

class RoleAddPermissions extends Component
{
    public $roleId;
    public $role;
    public $permissions;
    public $selectedPermissions = [];
    public $rolePermissions;

    public function givePermissionTo()
    {
        $this->validate([
            'selectedPermissions' => 'required|array|min:1',
        ]);

        try {
            // Fetch permission names from IDs
            $permissionNames = \Spatie\Permission\Models\Permission::whereIn('id', $this->selectedPermissions)
                ->pluck('name')
                ->toArray();

            // Sync permissions using names
            $this->role->syncPermissions($permissionNames);

            session()->flash('message', 'Pemissions assigned to Role successfully');
            return $this->redirect('/manage-role', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Unable to assign permissions to Role' . $e->getMessage());
            return $this->redirect('/manage-role', navigate: true);
        }
    }

    public function mount($id)
    {
        $this->roleId = $id;
        $this->role = \Spatie\Permission\Models\Role::findById($id);

        if (!$this->role) {
            abort(404, 'Role not found');
        }

        // Fetch role permissions and store in selectedPermissions to sync with checkboxes
        $this->rolePermissions = $this->role->permissions->pluck('id')->toArray();
        $this->selectedPermissions = $this->rolePermissions; // This ensures checkboxes are checked

        $this->permissions = \Spatie\Permission\Models\Permission::all();
    }


    public function render()
    {
        return view('livewire.role-add-permissions');
    }
}
