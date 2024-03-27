


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->

        <script src="https://cdn.tailwindcss.com"></script>
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

        <style>
            body{font-family: Nunito, system-ui, BlinkMacSystemFont, -apple-system, sans-serif ;}
            .form-search{
                height: 2.25rem;
                line-height: normal;
                border-color: var(--white);
                padding-left: 2.9rem;
                padding-right: .75rem;

                background-color: #eef1f4;
                max-width: 20rem;
                width: 400px;
                position: relative;
                top:25px;
                border-radius: 9999px!important;
            }

            .search-icon-center{
                position: absolute;
                top: 40px;
            }
            .loop{position: absolute; top:200px;}
            .font-bold, div, h1, h2, h3, h4, h5{font-family: Nunito, system-ui, BlinkMacSystemFont, -apple-system, sans-serif ;

            }
            .logo{height: 3.75rem;}
            .navbar{
                background-image: linear-gradient(
                    0deg
                    ,#7e8ea1,#3c4655);
                width: 13.75rem;
                font-family: Nunito, system-ui, BlinkMacSystemFont, -apple-system, sans-serif ;
                min-width: 300px;
            }


            .nav-item{
                font-size: .875rem;
                font-family: Nunito, system-ui, BlinkMacSystemFont, -apple-system, sans-serif ;

            }

            path, img{
                fill: white!important;
            }
            .bg-white{background-color: white!important;}
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{--   TOP navigation from layouts.navigation.blade.php         --}}
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow h-6">
                <div class="max-w-7xl  ">

                </div>
            </header>

            <!-- Page Content -->
            <main>
                    {{--    $header from dashboard.blade.php <x-app-layout><x-slot>  --}}
                {{ $header }}


                {{ $slot }}
            </main>
        </div>
    </body>
</html>
