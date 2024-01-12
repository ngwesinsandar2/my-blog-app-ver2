<x-page-layout>
    <div class="container mx-auto pt-4 pb-8 w-11/12 sm:w-4/5">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('user.home') }}"
                class="block text-sm text-[var(--tertiary)] border-2 border-[var(--tertiary)] rounded-md text-center px-4 py-1 transition-all hover:bg-[var(--tertiary)] hover:text-[var(--primary)]">Back</a>
            @auth
                <div class="flex items-center gap-2">
                    <a href=" {{ route('admin.edit-blogs', $blog->id) }} "
                        class="block text-sm bg-emerald-600/[.6] border border-emerald-600 rounded-md text-center px-4 py-1 transition-all hover:bg-transparent hover:text-emerald-600">
                        Edit
                    </a>
                    <a href=" {{ route('admin.delete-blogs', $blog->id) }} "
                        class="block text-sm bg-red-600/[.6] text-white border border-red-600 rounded-md text-center px-4 py-1 transition-all hover:bg-transparent hover:text-red-600">
                        Delete
                    </a>
                </div>
            @endauth
        </div>
        <div class="h-[400px] mb-4">
            <img src="{{ asset('assets/images/blogs/' . $blog->image_name) }}" alt=""
                class="rounded-md w-full h-full object-cover" />
        </div>
        <h1 class="font-bold text-2xl sm:text-4xl mb-4">{{ $blog->title }}</h1>
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center gap-2 w-1/2">
                <div class="w-11">
                    <img src="{{ asset('assets/images/profiles/' . $blog->user->image_name) }}" alt="logo"
                        class="w-full rounded-full" />
                </div>
                <div>
                    <h6 class="text-[var(--secondary)]">{{ $blog->user->name }}</h6>
                </div>
            </div>
            <p class="text-[var(--secondary)]">{{ $blog->created_at->diffForHumans() }}</p>
        </div>
        <p>
            {{ $blog->description }}
        </p>
    </div>
</x-page-layout>
