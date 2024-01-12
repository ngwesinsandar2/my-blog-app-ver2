<x-admin-layout>
    <div>
        <div class="flex justify-end items-center">
            <a href="{{ route('admin.create-blogs') }}"
                class="uppercase px-6 py-3 rounded-xl text-white bg-[var(--tertiary)] border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">
                &#43; Create New Blog
            </a>
        </div>
        <table class="border-separate border-spacing-y-4 table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="p-4">#</th>
                    <th class="p-4">User</th>
                    <th class="p-4">Blog Title</th>
                    <th class="p-4">Blog Date</th>
                    <th class="p-4">Blog Description</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr class="shadow rounded-md">
                        <td class="p-4">{{ $blog->id }}</td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-1/6">
                                    <img src="{{ asset('assets/images/profiles/' . $blog->user->image_name) }}"
                                        alt="logo" class="w-full rounded-full" />
                                </div>
                                <div>
                                    <h6 class="font-bold">{{ $blog->user->name }}</h6>
                                    <p class="text-sm">{{ $blog->user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <p>{{ $blog->title }}</p>
                        </td>
                        <td class="p-4">Monday 05, 2021</td>
                        <td class="p-4">
                            <p class="line-clamp-1 w-36">
                                {{ $blog->description }}
                            </p>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.show-blog', $blog->id) }}"
                                    class="block text-sm text-[var(--secondary)] border-2 border-[var(--primary)] rounded-full text-center px-4 py-1 transition-all hover:bg-[var(--primary)]">Detail</a>
                                <a href="{{ route('admin.edit-blogs', $blog->id) }}"
                                    class="block text-sm bg-emerald-600/[.6] border border-emerald-600 rounded-full text-center px-4 py-1 transition-all hover:bg-transparent hover:text-emerald-600">Edit</a>
                                <a href="{{ route('admin.delete-blogs', $blog->id) }}"
                                    class="block text-sm bg-red-600/[.6] text-white border border-red-600 rounded-full text-center px-4 py-1 transition-all hover:bg-transparent hover:text-red-600">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
