<x-admin-layout>
    <div>
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.blogs') }}"
                class="block text-sm text-[var(--tertiary)] border-2 border-[var(--tertiary)] rounded-md text-center px-4 py-1 transition-all hover:bg-[var(--tertiary)] hover:text-[var(--primary)]">Back</a>
            <div class="flex gap-4 items-center">
                <a href="{{ route('admin.edit-blogs', $blog->id) }}"
                    class="block text-sm bg-emerald-600/[.6] border border-emerald-600 rounded-md text-center px-4 py-1 transition-all hover:bg-transparent hover:text-emerald-600">
                    Edit
                </a>
                <a href="{{ route('admin.delete-blogs', $blog->id) }}"
                    class="block text-sm bg-red-600/[.6] text-white border border-red-600 rounded-md text-center px-4 py-1 transition-all hover:bg-transparent hover:text-red-600">
                    Delete
                </a>
            </div>
        </div>

        <div>
            <div class="grid grid-cols-3 items-center">
                {{-- id --}}
                <div class="mb-6">
                    <p class="font-bold">#</p>
                    <p>{{ $blog->id }}</p>
                </div>
                {{-- author --}}
                <div class="mb-6">
                    <p class="font-bold">Author</p>
                    <div class="flex items-center gap-2">
                        <div class="w-10">
                            <img src="{{ asset('assets/images/profiles/' . $blog->user->image_name) }}" alt="logo"
                                class="w-full rounded-full" />
                        </div>
                        <div>
                            <h6 class="font-bold">{{ $blog->user->name }}</h6>
                            <p class="text-sm">{{ $blog->user->email }}</p>
                        </div>
                    </div>
                </div>
                {{-- title --}}
                <div class="mb-6">
                    <p class="font-bold">Blog Title</p>
                    <p>{{ $blog->title }}</p>
                </div>
                {{-- category --}}
                <div class="mb-6">
                    <p class="font-bold">Category Name</p>
                    <p>{{ $blog->category->category_name }}</p>
                </div>
                {{-- description --}}
                <div class="mb-6 col-span-full">
                    <p class="font-bold">Description</p>
                    <p>{{ $blog->description }}</p>
                </div>
                {{-- image --}}
                <div class="col-span-full">
                    <p class="font-bold mb-2">Blog Image</p>
                    <img src="{{ asset('assets/images/blogs/' . $blog->image_name) }}" alt="" class="w-2/3" />
                </div>
            </div>
        </div>


    </div>
</x-admin-layout>
