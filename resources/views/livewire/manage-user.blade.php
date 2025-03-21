<div>

    <div class="flex justify-around mb-4">
        <h1> Manage Users</h1>
        <div>
            <a href="{{ route('add-user') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                wire:navigate>Add User</a>
        </div>
    </div>

    <div class="p-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <livewire:components.success-message :message="session('message')" />
            </div>
        @elseif (session()->has('error'))
            <livewire:components.error-alert :message="session('error')" />
        @endif
    </div>

    <livewire:components.links />

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User Name
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('edit-user', $user->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                wire:navigate>Edit</a>
                            |
                            <a href="{{ route('delete-user', $user->id) }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                wire:navigate>Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
