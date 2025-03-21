<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/blogram-icon.svg') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>

    </head>
    <body class="bg-light">
        <div class="min-vh-100 bg-light">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="container py-4">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="container my-4">
                {{ $slot }}
            </main>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Add htmx CDN -->
        <script src="https://unpkg.com/htmx.org@1.9.10"></script>

        <!-- Add reinitialization script -->
        {{-- <script>
            document.body.addEventListener('htmx:afterSwap', function(event) {
                // Find all dropdown toggles and reinitialize them
                document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function(dropdownToggle) {
                    // Remove any existing dropdown instances to avoid duplicates
                    const existingDropdown = bootstrap.Dropdown.getInstance(dropdownToggle);
                    if (existingDropdown) {
                        existingDropdown.dispose();
                    }
                    // Initialize a new dropdown instance
                    new bootstrap.Dropdown(dropdownToggle);
                });
            });
        </script> --}}
    </body>
</html>
