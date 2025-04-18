<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WheelyGoodCars')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @yield('styles')
    @livewireStyles

    <style>
        nav[role="navigation"] > div:first-child {
            margin-right: 2rem;
            font-size: 0.9rem;
            color: #666;
        }

        nav[role="navigation"] .relative.inline-flex {
            background-color: #073B3A;
            color: white;
            border-radius: 6px;
            padding: 6px 12px;
            font-size: 0.875rem;
            margin-left: 10px;
            margin-right: 5px;
            transition: background 0.3s ease;
        }

        nav[role="navigation"] .relative.inline-flex:hover {
            background-color: #045050;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark d-print-none bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><strong class="text-primary">Wheely</strong> good cars<strong class="text-primary">!</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('cars.offers') }}">Alle auto's</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('cars.ownoffers') }}">Mijn aanbod</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('offers.create') }}">Aanbod plaatsen</a></li>
                    @endauth
                    @auth
                        @if(auth()->user()->email == 'a@a.com')
                            <li class="nav-item"><a class="nav-link text-light" href="{{ route('admin.sus-sellers')}}">Verdachte verkopers</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="{{ route('admin.car-views')}}">Auto views</a></li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('register') }}">Registreren</a></li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('login') }}">Inloggen</a></li>
                    @endguest
                    @auth
                        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('logout') }}">Uitloggen</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4">@yield('header')</h1>
        @yield('content')
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
