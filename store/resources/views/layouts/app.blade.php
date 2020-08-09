<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>PlacetoPay Store</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,500,500i,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <h1>PlacetoPay Store</h1>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    <flash message="{{ session('flash') }}"></flash>

    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>