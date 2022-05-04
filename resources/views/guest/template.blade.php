<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('soft-ui-dashboard-main') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('soft-ui-dashboard-main') }}/assets/css/soft-ui-dashboard.css?v=1.0.5"
        rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="nav-link">
                            @if (Route::has('login'))
                                @auth
                                    @can('admin')
                                        <a href={{ route('dataRuangan') }}>Admin</a>
                                    @endcan
                                @endauth
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listRuangan') }}">Booking</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li>
                                            <a class="dropdown-item" href={{ route('logout') }}
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                    </form>
                                </ul>
                            @else
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('soft-ui-dashboard-main') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('soft-ui-dashboard-main') }}/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('soft-ui-dashboard-main') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('soft-ui-dashboard-main') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ asset('soft-ui-dashboard-main') }}/assets/js/plugins/chartjs.min.js"></script>
</body>

</html>
