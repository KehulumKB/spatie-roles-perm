<div>
    Add User

    <div class="mt-10 w-1/2">
        <form action="" class="space-y-4" wire:submit.prevent="addUser">
            <flux:input wire:model="username" label="Username" />
            <flux:input wire:model="email" label="Email" />
            <flux:input wire:model="password" label="Password" />

            @foreach ($roles as $role)
                <flux:checkbox wire:model="selectedRoles" label="{{ $role->name }}"
                    value="{{ $role->id }}" />
            @endforeach

            <flux:button type="submit">Add User</flux:button>

        </form>
    </div>


</div>
