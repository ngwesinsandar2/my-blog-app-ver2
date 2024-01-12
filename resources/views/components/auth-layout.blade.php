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
    <div class="px-10 py-2">
        <x-navbar />
    </div>

    <main>
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.addEventListener('mouseenter', Swal.stopTimer)
        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        // })
        @if (Session('auth-error'))
            Swal.fire({
                icon: 'error',
                title: 'Authentication Failed',
                text: "{{ Session('auth-error') }}",
            })
        @endif
    </script>
</body>

</html>
