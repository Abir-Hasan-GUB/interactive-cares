<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>

    <!-- AlpineJS CDN -->
    <script defer src="{{ asset('https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js') }}"></script>

    <!-- Include the compiled app.js -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('js/common.js') }}">

    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin />
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap') }}"
        rel="stylesheet" />

    {{-- Fontawesome --}}
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css') }}"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    @if (Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register')
        @include('componants.header.nav')
    @endif

    <section id="content-div">
        <main
            class="{{ Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register' ? 'container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen' : '' }}">
            @yield('content')
        </main>
    </section>

    @if (Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register')
        @include('componants.footer.footer')
    @endif

    @include('scripts')
    @yield('scripts')
</body>

</html>
