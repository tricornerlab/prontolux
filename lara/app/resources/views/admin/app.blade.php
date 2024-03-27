
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


        {{-- CSS       --}}

        <link rel="stylesheet" type="text/css" href="/storage/css/appadmin.css" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script href="/storage/js/app.js"></script>


{{--letters #7c858e--}}

        <style>



        </style>
    </head>

    <body class="font-sans antialiased ">






            <!-- TOP WHITE HEADER (dublicate preview) -->
                <header class="bg-white shadow">


                </header>



            <!-- MAIN CONTAINER FOR CONTENT -->
{{--            <main class=" w-full">--}}
{{--                --}}{{--  x-slot component inserted from DASHBOARD.blade.php  --}}
{{--                <div class="flex">--}}

{{--                    {{ $slot }}--}}
{{--                </div>--}}
{{--            </main>--}}
        </div>







        {{--        FOOTER--}}

    </body>
</html>
