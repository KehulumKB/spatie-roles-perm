<div>
    Update Permission
    Role: {{ $role->name }} <br>

    <div>

        <div class="mt-10 w-1/2">
            Select Permissions
            <br>
            <form action="" class="space-y-4" wire:submit.prevent="updatePermissionTo">

                <div class="flex gap-10 mt-4">
                    @foreach ($permissions as $permission)
                        <flux:checkbox wire:model="selectedPermissions[]" label="{{ $permission->name }}"
                            value="{{ $permission->id }}" />
                    @endforeach
                </div>

                <flux:button type="submit">Update Permission</flux:button>
            </form>
        </div>
    </div>

</div>
