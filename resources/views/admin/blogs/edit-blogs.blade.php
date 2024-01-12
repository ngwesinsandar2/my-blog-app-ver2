<x-admin-layout>
    <div>
        <form action="{{ route('admin.update-blogs', $blog->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            {{-- title --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="title" class="block font-semibold mb-2">Blog Title</label>
                    <input type="text" name="title" id="title" value="{{ $blog->title }}"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('title')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- category --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="category" class="block font-semibold mb-2">Category</label>
                    <select name="category" id="category" value="{{ $blog->category_id }}"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]">
                        <option value="" disabled>Please Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- des --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="description" class="block font-semibold mb-2">Blog Description</label>
                    <textarea name="description" id="" cols="30" rows="10"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]">{{ $blog->description }}
                    </textarea>
                </div>
                @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- photo --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="image" class="block font-semibold mb-2">Blog Photo</label>
                    <input type="file" name="image" id="image"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                <div>
                    <img src="{{ asset('assets/images/blogs/'. $blog->image_name) }}" alt="" class="w-1/2" >
                </div>

                @error('image')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 justify-end">
                <a href="{{ route('admin.blogs') }}"
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
