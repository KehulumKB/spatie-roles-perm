<div>
    Edit Permissions

    <div class="mt-10 w-1/2">
        <form action="" class="space-y-4" wire:submit.prevent="editPermission">
            <flux:input wire:model="permission" label="Permission" />
            <flux:button type="submit">Edit Permission</flux:button>
        </form>
    </div>
</div>
