<x-admin-layout>
    <div>
        <form action="{{ route('admin.update-categories', $category->id) }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="category" class="block font-semibold mb-2">Category Name</label>
                    <input type="text" name="category_name" id="category" value="{{ $category->category_name }}"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('category_name')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 justify-end">
                <a href="{{ route('admin.categories') }}"
                    class="text-[var(--tertiary)] text-center px-6 py-2 rounded-md border border-[var(--tertiary)] transition-all hover:bg-transparent hover:bg-[var(--tertiary)]  hover:text-white">
                    Back
                </a>
                <button type="submit"
                    class="bg-[var(--tertiary)] text-white text-center px-6 py-2 rounded-md border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
