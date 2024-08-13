<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Beadando | @yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


        @yield('style')


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  p-4">

        <a class="navbar-brand" href="{{route('home')}}">Laravel Beadandó</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        @if (Auth::user()->admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('places.index')}}">Helyszínek</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('characters.index')}}">{{Auth::user()->name}}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{route('logout')}}" id="logout-form">
                                @csrf
                                <a href="{{ route('logout') }}"
                                class="nav-link"
                                onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
                                >Kijelentkezés</a>
                            </form>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Bejelentkezés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Regisztráció</a>
                        </li>
                    @endauth
                </ul>
        </div>

      </nav>
      <div class="container mx-auto  my-3">
        @yield('content')

      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
