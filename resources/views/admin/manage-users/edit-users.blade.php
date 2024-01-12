<x-admin-layout>
    <div>
        <form action="{{ route('admin.update-users', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="username" class="block font-semibold mb-2">User Name</label>
                    <input type="text" name="username" id="username" value="{{ $user->name }}"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('username')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="email" class="block font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('email')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Role --}}
            <div class="mb-4">
                <div class="mb-1">
                    <label for="role" class="block font-semibold mb-2">Role</label>
                    <select name="role" id="role" value="{{ $user->role_id }}"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]">
                        <option value="" disabled>Please Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->role_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('role')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Profile Picture --}}
            <div class="mb-8">
                <div class="mb-1">
                    <label for="image" class="block font-semibold mb-2">Profile Picture</label>
                    <div class="mb-2 w-52 h-52">
                        <img src="{{ asset("assets/images/profiles/$user->image_name") }}" alt=""
                            class="w-full h-full rounded-md object-cover" />
                    </div>
                    <input type="file" name="image" id="image"
                        class="rounded-md shadow w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                </div>
                @error('image')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 justify-end">
                <a href="{{ route('admin.manage-users') }}"
                    class="text-[var(--tertiary)] text-center px-6 py-2 rounded-md border border-[var(--tertiary)] transition-all hover:bg-transparent hover:bg-[var(--tertiary)]  hover:text-white">
                    Back
                </a>
                <button
                    class="bg-[var(--tertiary)] text-white text-center px-6 py-2 rounded-md border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
