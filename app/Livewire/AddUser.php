<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddUser extends Component
{
    public $username;
    public $email;
    public $password;
    public $selectedRoles = [];

    public function addUser()
    {
        $this->validate([
            'username' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'selectedRoles' => 'required|array|min:1',
        ]);

        try {
            $user = \App\Models\User::create([
                'name' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);

            // Convert role IDs to actual role names before syncing
            $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();
            $user->syncRoles($roleNames);
            
            session()->flash('message', 'User added successfully');
            return $this->redirect('/manage-user', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Unable to add user' . $e->getMessage());
            return $this->redirect('/manage-user', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.add-user', [
            'roles' => Role::all(),
        ]);
    }
}
