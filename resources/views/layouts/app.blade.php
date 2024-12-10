<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pam England\'s Sculpture Studio')</title>
    
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Custom CSS --}}
    @yield('styles')
</head>
<body>
    <header class="header">
        <nav>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/courses">Courses</a></li>
                <li><a href="/shop">Shop</a></li>
            </ul>
            <div class="color-picker-container">
                @hasSection('colorPicker')
                    <label for="navbar-color">Navbar Color:</label>
                    <input type="color" oninput="changeNavColor(event)" id="navbar-color">

                    <label for="body-color">Body Color:</label>
                    <input type="color" id="body-color" oninput="changeBodyColor(event)">
                @endif
            </div>

        </nav>
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2024 Pam England's Sculpture Studio | <a href="/contact">Contact Us</a></p>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Custom Scripts --}}
    @yield('scripts')
</body>
</html>