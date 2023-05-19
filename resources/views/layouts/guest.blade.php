<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
        @vite(['resources/css/bootstrap.min.css', 'resources/css/all.min.css', 'resources/css/style.css', 'resources/css/media.css', 'resources/js/all.min.js', 'resources/js/bootstrap.bundle.min.js'])

    </head>
    <body class="font-sans text-gray-900 antialiased">

        @include('layouts.navbar')

        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900"> --}}
            {{-- <div class="w-full min-h-screen px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> --}}
                {{ $slot }}
            {{-- </div> --}}
        {{-- </div> --}}

         {{-- ============= footer ========== --}}
        <section>
            <div class="container">
            <div class="footer rounded">
                <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="desc ">
                    <div class="row">
                        <div class="col-6">
                        <ul class="list-unstyled">
                            <li><i class="fa-solid fa-arrow-right"></i> Home</li>
                            <li><i class="fa-solid fa-arrow-right"></i> About</li>
                            <li><i class="fa-solid fa-arrow-right"></i> Menu</li>
                            <li><i class="fa-solid fa-arrow-right"></i> Recipes</li>
                        </ul>
                        </div>
                        <div class="col-6">
                        <div class="imgBox">
                            {{-- <img src="img/icon7.png" alt=""> --}}
                            <img src="{{ Storage::url('img/icon7.png') }}" alt="">
                        </div>
                        </div>
                    </div>
                    <div class="copy text-center">© <span>Crustique</span> All Rights Reserved.</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="logo d-flex justify-content-center align-items-center">
                    <div class="imgBox">
                        {{-- <img src="img/icon.png" alt=""> --}}
                        <img src="{{ Storage::url('img/icon.png') }}" alt="">
                    </div>
                    <h1 class="text-center pt-4">Crustique</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="address">
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-arrow-right"></i> Address: Sidi-gaber, zohier st.</li>
                        <li><i class="fa-solid fa-arrow-right"></i> Phone: 999 999 999</li>
                    </ul>
                    </div>
                    <div class="connect">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    </body>
</html>
