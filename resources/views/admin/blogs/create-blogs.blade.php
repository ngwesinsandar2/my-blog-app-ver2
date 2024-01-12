<x-admin-layout>
    <div>
        <form action="{{ route('admin.store-blogs') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="title" class="block font-semibold mb-2">Blog Title</label>
                    <input type="text" name="title" id="title"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('title')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="category" class="block font-semibold mb-2">Category</label>
                    <select name="category" id="category"
                        class="rounded-md w-full p-2 outline-none border focus:border-[var(--tertiary)]">
                        <option value="" selected disabled>Please Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="image" class="block font-semibold mb-2">Blog Photo</label>
                    <input type="file" name="image" id="image"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('image')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-8">
                <div class="mb-1">
                    <label for="description" class="block font-semibold mb-2">Blog Description</label>
                    <textarea name="description" id="" cols="30" rows="10"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]"></textarea>
                </div>
                @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 justify-end">
                <a href="{{ route('admin.blogs') }}"
                    class="text-[var(--tertiary)] text-center px-6 py-2 rounded-md border border-[var(--tertiary)] transition-all hover:bg-[var(--tertiary)]  hover:text-white">
                    Back
                </a>
                <button type="submit"
                    class="bg-[var(--tertiary)] text-white text-center px-6 py-2 rounded-md border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
