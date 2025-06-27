<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            width: 100%;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9fefb;
        }
    </style>

    <title>TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
</head>
<body>
    <div class="navbar-container">
        <ul class="ul-navbar">
            <a href="{{ route('dashboard') }}" class="a-navbar">
                <img src="{{ asset('dist/img/TaniGo_logo.png') }}" class="img-logo">
            </a> 
            <li class="li-navbar"><a href="{{ route('dashboard') }}" class="a-navbar">Home</a></li>
            <li class="li-navbar"><a href="/produk" class="a-navbar">Produk</a></li>
            <li class="li-navbar"><a href="/tentangkami" class="a-navbar">Tentang Kami</a></li>
            <li class="li-navbar"><a href="/keranjang" class="a-navbar">Keranjang</a></li>  
        </ul>

        <!-- Profil & Logout -->
        <div class="auth-navbar">
            <a href="/profil" class="profile">
                {{ Auth::user()->name }}
                <img src="https://img.icons8.com/ios-glyphs/30/user--v1.png" alt="User Icon"/>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>       
    </div>
</body>
</html>
