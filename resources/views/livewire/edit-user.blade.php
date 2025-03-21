<div>
    Edit User

    <div class="mt-10 w-1/2">
        <form action="" class="space-y-4" wire:submit.prevent="updateUser">
            <flux:input wire:model="username" label="Username" />
            <flux:input wire:model="email" label="Email" />
            <flux:input wire:model="password" label="Password" />
            <flux:button type="submit">Update User</flux:button>
        </form>
    </div>
</div>
