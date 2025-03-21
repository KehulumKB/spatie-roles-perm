<?php

namespace App\Livewire;

use Livewire\Component;

class EditUser extends Component
{
    public $userId;
    public $username;
    public $email;

    public function updateUser()
    {
        $this->validate([
            'username' => 'required|string|min:3',
            'email' => 'required|email',
        ]);

        try {
            $user = \App\Models\User::find($this->userId);
            $user->name = $this->username;
            $user->email = $this->email;
            $user->save();

            session()->flash('message', 'User updated successfully');
            return $this->redirect('/manage-user', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Unable to update user' . $e->getMessage());
            return $this->redirect('/manage-user', navigate: true);
        }
    }
    
    public function mount($id)
    {
        $this->userId = $id;
        $user = \App\Models\User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $this->username = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
