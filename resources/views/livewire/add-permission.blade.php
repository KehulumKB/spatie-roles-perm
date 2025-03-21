<div>
    Add Permissions

    <div class="mt-10 w-1/2">
        <form action="" class="space-y-4" wire:submit.prevent="addPermission">
            <flux:input wire:model="permission" label="Permission" />
            <flux:button type="submit">Add Permission</flux:button>
        </form>
    </div>
</div>
