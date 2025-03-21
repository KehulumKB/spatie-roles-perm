<div class="space-x-4 my-4">
    <a href="{{ route('manage-role') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
        wire:navigate>Roles</a>

         <a href="{{ route('manage-permission') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
        wire:navigate>Permissions</a>

         <a href="{{ route('manage-user') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
        wire:navigate>Users</a>
</div>
