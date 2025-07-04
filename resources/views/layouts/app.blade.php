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

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            border-bottom: 3px solid #3b82f6;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #1e40af;
            font-weight: 600;
        }

        .navbar-logo i {
            font-size: 1.8rem;
            margin-right: 12px;
            color: #3b82f6;
        }

        .logo-text {
            font-size: 1.2rem;
            line-height: 1.2;
        }

        .logo-subtitle {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 400;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            list-style: none;
        }

        .navbar-menu li {
            margin: 0 5px;
        }

        .navbar-menu a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #475569;
            font-weight: 500;
            font-size: 0.9rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-menu a i {
            margin-right: 8px;
        }

        .navbar-menu a:hover,
        .navbar-menu a.active {
            background: #dbeafe;
            color: #1e40af;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-info {
            text-align: right;
            margin-right: 12px;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
        }

        .user-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 110%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            min-width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .dropdown.active .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: block;
            padding: 12px 16px;
            text-decoration: none;
            color: #374151;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .dropdown-item:hover {
            background: #f9fafb;
        }

        .dropdown-item.danger {
            color: #dc2626;
        }

        .dropdown-item.danger:hover {
            background: #fef2f2;
        }

        .content {
            margin-top: 90px;
            padding: 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body class="font-sans antialiased">

    {{-- Navbar --}}
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">
                <i class="fas fa-comments"></i>
                <div>
                    <div class="logo-text">Dashboard UI</div>
                    <div class="logo-subtitle">Sistem Informasi</div>
                </div>
            </a>
            <ul class="navbar-menu" id="navbarMenu">
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i
                            class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('pengaduan.create') }}"
                        class="{{ request()->routeIs('pengaduan.create') ? 'active' : '' }}"><i
                            class="fas fa-plus-circle"></i> Membuat Pengaduan</a></li>
                <li><a href="{{ route('pengaduan.history') }}"
                        class="{{ request()->routeIs('pengaduan.history') ? 'active' : '' }}"><i
                            class="fas fa-history"></i> Melihat History</a></li>
                <li><a href="{{ route('pengaduan.status') }}"
                        class="{{ request()->routeIs('pengaduan.status') ? 'active' : '' }}"><i
                            class="fas fa-tasks"></i> Melihat Status</a></li>
            </ul>
            <div class="user-profile">
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ Auth::user()->role ?? 'User' }}</div>
                </div>
                <div class="dropdown">
                    <div class="user-avatar" onclick="toggleDropdown()">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        @isset($header)
            <header class="bg-white shadow mb-4">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        function toggleDropdown() {
            document.querySelector('.dropdown').classList.toggle('active');
        }

        document.addEventListener('click', function (e) {
            const dropdown = document.querySelector('.dropdown');
            const avatar = document.querySelector('.user-avatar');
            if (!dropdown.contains(e.target) && !avatar.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    </script>
</body>

</html>