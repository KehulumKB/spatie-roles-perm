<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public function mount($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            session()->flash('message', 'User deleted successfully');
            return $this->redirect('/manage-user', navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'User does not exist');
            return $this->redirect('/manage-user', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}
