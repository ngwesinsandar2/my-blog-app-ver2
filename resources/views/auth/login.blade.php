<x-auth-layout>

    <div>
        <div class="realtive">
            <div class="h-screen">
                <img src="{{ asset('assets/images/login1.jpg') }}" alt="" class="w-full h-full object-cover" />
            </div>
            <div
                class="backdrop-blur-lg md:w-1/2 lg:w-1/4 absolute top-1/2 -translate-y-1/2 right-[10%] bg-white/60 py-14 px-8 rounded-md">
                <div class="flex items-center gap-2 mb-4">
                    <div><img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-10 rounded-full" />
                    </div>
                    <p class="font-bold text-2xl">blog.</p>
                </div>

                <h1 class="mb-6 font-bold text-4xl">Sign in</h1>

                <form action="{{ route('auth.store-login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <div class="mb-1">
                            <label for="email" class="block font-semibold mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                class="rounded-md w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                        </div>
                        @error('email')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <div class="mb-1">
                            <label for="psw" class="block font-semibold mb-2">Password</label>
                            <input type="password" name="password" id="psw"
                                class="rounded-md w-full p-2 outline-none border focus:border-[var(--tertiary)]" />
                        </div>
                        @error('password')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-[var(--tertiary)] text-white text-center px-10 py-3 rounded-md border border-[var(--tertiary)] transition-all hover:bg-transparent hover:text-[var(--tertiary)]">Sign
                        in</button>
                </form>
            </div>
        </div>
    </div>

</x-auth-layout>
