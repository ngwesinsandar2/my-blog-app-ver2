<x-admin-layout>
    <div>
        <div class="flex justify-end items-center">
            <a href="{{ route('admin.create-roles') }}"
                class="uppercase px-6 py-3 rounded-xl text-white bg-[var(--tertiary)] border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">
                &#43; Create New Role
            </a>
        </div>
        <table class="border-separate border-spacing-y-4 table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="p-4">#</th>
                    <th class="p-4">Role Name</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="shadow rounded-md">
                        <td class="p-4">{{ $role->id }}</td>
                        <td class="py-4">{{ $role->role_name }}</td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.edit-roles', $role->id) }}"
                                    class="block text-sm bg-emerald-600/[.6] border border-emerald-600 rounded-full text-center px-4 py-1 transition-all hover:bg-transparent hover:text-emerald-600">Edit</a>
                                <a href="{{ route('admin.delete-roles', $role->id) }}"
                                    class="block text-sm bg-red-600/[.6] text-white border border-red-600 rounded-full text-center px-4 py-1 transition-all hover:bg-transparent hover:text-red-600">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
