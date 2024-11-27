<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wallat Managemenet System</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    </head>
    <body class="container font-sans antialiased">
        <div class="bg-gray-50 text-black/50 min-vh-100 d-flex flex-column justify-content-center align-items-center">


        <div class="border border-primary p-4 rounded shadow-sm" style="max-width: 400px; width: 100%; background-color: white;">
                <div class="text-center my-4">
                    <h2 class="fw-bold text-primary py-3 px-4 rounded">
                        Wallet Management System
                    </h2>
                </div>

                @if (Route::has('login'))
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        @auth

                            <a href="{{ route('wallet.balance') }}" class="btn btn-outline-primary mx-2 py-2 px-4 rounded-pill">
                                Dashboard
                            </a>
                        @else

                            <a href="{{ route('login') }}" class="btn btn-outline-secondary mx-2 py-2 px-4 rounded-pill">
                                Log in
                            </a>

                            @if (Route::has('register'))

                                <a href="{{ route('register') }}" class="btn btn-outline-secondary mx-2 py-2 px-4 rounded-pill">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>
