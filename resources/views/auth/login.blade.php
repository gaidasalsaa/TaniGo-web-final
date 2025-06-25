<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/register.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="register-container">
        <div class="left-panel">
            <img src="{{ asset('dist/img/TaniGo_logo.png') }}" alt="TaniGo Logo" class="logo">
            <h1>Selamat<br>Datang Kembali!</h1>
        </div>
        <div class="right-panel">
            <form action="{{ route('proseslogin') }}" method="POST">
                @csrf

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit">Login</button>

                <p class="login-link">Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
            </form>

        </div>
    </div>
</body>
</html>
