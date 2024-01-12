<x-admin-layout>
    <div>
        <div class="flex justify-end items-center">
            <a href="{{ route('admin.create-users') }}"
                class="uppercase px-6 py-3 rounded-xl text-white bg-[var(--tertiary)] border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">
                &#43; Create New User
            </a>
        </div>
        <table class="border-separate border-spacing-y-4 table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="p-4">#</th>
                    <th class="p-4">User Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Profile Pic</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="shadow rounded-md">
                        <td class="p-4">{{ $user->id }}</td>
                        <td class="py-4">{{ $user->name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">{{ $user->role->role_name }}</td>
                        <td class="p-4">
                            <div class="w-28">
                                <img src="{{ asset('assets/images/profiles/' . $user->image_name) }}" alt="user profile image"
                                    class="w-full rounded-md" />
                            </div>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                {{-- <a href=""
                                    class="block text-sm text-[var(--secondary)] border-2 border-[var(--primary)] rounded-full text-center px-4 py-1 transition-all hover:bg-[var(--primary)]">Detail</a> --}}
                                <a href="{{ route('admin.edit-users', $user->id) }}"
                                    class="block text-sm bg-emerald-600/[.6] border border-emerald-600 rounded-full text-center px-4 py-1 transition-all hover:bg-transparent hover:text-emerald-600">Edit</a>
                                <a href="{{ route('admin.delete-users', $user->id) }}"
                                    class="block text-sm bg-red-600/[.6] text-white border border-red-600 rounded-full text-center px-4 py-1 transition-all hover:bg-transparent hover:text-red-600">Remove</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
