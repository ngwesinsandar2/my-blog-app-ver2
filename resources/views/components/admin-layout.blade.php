<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <title>My Blog App</title>
    
    @vite('resources/css/app.css')
</head>

<body>
    <div class="px-10 pt-4 pb-8">
        <x-navbar />

        <main>
            <div class="container mx-auto pt-4 grid grid-cols-5 gap-8">
                <nav class="p-4 shadow-lg bg-[var(--primary)] h-[620px] rounded-xl">
                    <ul class="list-none flex flex-col gap-8 p-4 text-center">
                        <li>
                            <a href="{{ route('admin.home') }}"
                                class="uppercase py-2 block rounded-xl {{ request()->path() == 'admin-dashboard' ? 'text-white bg-[var(--tertiary)]' : 'text-[var(--secondary)]' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage-users') }}"
                                class="uppercase py-2 block rounded-xl {{ request()->path() == 'admin-dashboard/manage-users' ? 'text-white bg-[var(--tertiary)]' : 'text-[var(--secondary)]' }}">
                                Manage Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.roles') }}"
                                class="uppercase py-2 block rounded-xl {{ request()->path() == 'admin-dashboard/roles' ? 'text-white bg-[var(--tertiary)]' : 'text-[var(--secondary)]' }}">
                                Roles
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogs') }}"
                                class="uppercase py-2 block rounded-xl {{ request()->path() == 'admin-dashboard/blogs' ? 'text-white bg-[var(--tertiary)]' : 'text-[var(--secondary)]' }}">Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories') }}"
                                class="uppercase py-2 block rounded-xl {{ request()->path() == 'admin-dashboard/categories' ? 'text-white bg-[var(--tertiary)]' : 'text-[var(--secondary)]' }}">
                                Categories
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="col-span-4">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if (Session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        @endif
    </script>
</body>

</html>
