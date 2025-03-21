<div>
    Edit Role

    <div class="mt-10 w-1/2">
        <form action="" class="space-y-4" wire:submit.prevent="editRole">
            <flux:input wire:model="role" label="Role" />
            <flux:button type="submit">Edit role</flux:button>
        </form>
    </div>
</div>
