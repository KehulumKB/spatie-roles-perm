<div>
    Add Role

    <div class="mt-10 w-1/2">
        <form action="" class="space-y-4" wire:submit.prevent="addRole">
            <flux:input wire:model="role" label="Role" />
            <flux:button type="submit">Add Role</flux:button>
        </form>
    </div>
</div>
