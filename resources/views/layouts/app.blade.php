<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BeyondTheStalls</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <header id="header">
            <nav class="navbar navbar-expand-lg navbar-white" style="background-color: #333d29;">
                <a class="navbar-brand" href="{{ route('home') }}" style="color: #ffffff;">
                    <h3 class="px-5">
                        <i class="fas fa-building"></i> BeyondTheStalls
                    </h3>
                </a>
                @if(Auth::check())
                    @if(Auth::user()->usertype=='admin')
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-link" href="{{ route('tenant.index') }}" style="color: #ffffff;">
                                    <i class="fas fa-users"></i> Tenants
                                </a>
                                <a class="nav-link" href="{{ route('admin.analytics') }}" style="color: #ffffff;">
                                    <i class="fas fa-chart-area"></i> Analytics
                                </a>
                                <a class="nav-link" href="{{ route('stall.index') }}" style="color: #ffffff;">
                                    <i class="fas fa-warehouse"></i> Monitoring
                                </a>
                                <a class="nav-link" href="{{ route('payment.index') }}" style="color: #ffffff;">
                                    <i class="fas fa-money-bill"></i> Payment
                                </a>
                                <a class="nav-link" href="{{ route('admin.inventory') }}" style="color: #ffffff;">
                                    <i class="fas fa-list-alt"></i> Inventory
                                </a>
                                <a class="nav-link" href="{{ route('parking.index') }}" style="color: #ffffff;">
                                    <i class="fas fa-car"></i> Parking
                                </a>
                                <a class="nav-link" href="{{ route('payment.index') }}" style="color: #ffffff;">
                                    <i class="fas fa-exclamation-circle"></i> Concern
                                </a>
                            </div>
                        </div>
                    @else
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <!-- Tenant Links -->
                            <a class="nav-link" href="{{ route('tenant.stall') }}" style="color: #ffffff;">
                                <i class="fas fa-warehouse"></i> My Stall
                            </a>
                            <!-- About and Contact Us Links -->
                            <a class="nav-link" href="{{ route('tenant.stall') }}" style="color: #ffffff;">
                                <i class="fas fa-question"></i> About
                            </a>
                        </div>
                    </div>
                    @endif
                    <!-- User Dropdown -->
                    <div class="ml-auto">
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" aria-expanded="false" style="color: #ffffff;">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}" style="color: #333d29;">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-caret-right"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </nav>
        </header>


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            var dropdownToggle = document.querySelector('.dropdown-toggle');

            dropdownToggle.addEventListener('click', function() {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                } else {
                    dropdownMenu.classList.add('show');
                }
            });

            document.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
