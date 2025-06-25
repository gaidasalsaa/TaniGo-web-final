<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi | TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/register.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="register-container">
        <div class="left-panel">
            <img src="{{ asset('dist/img/TaniGo_logo.png') }}" alt="TaniGo Logo" class="logo">
            <h1>Buat Akun<br>Anda!</h1>
        </div>
        <div class="right-panel">
            @if ($errors->any())
                <div style="background: #f8d7da; padding: 10px; border-radius: 4px; color: #721c24; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h2>Form Registrasi</h2>

                <label for="nama">Nama</label>
                <input type="text" name="nama" required>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="no_hp">Nomor HP</label>
                <input type="text" name="no_hp" required>

                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" required>

                <label for="kota">Kota</label>
                <input type="text" name="kota" required>

                <label for="alamat">Alamat</label>
                <textarea name="alamat" rows="3" required></textarea>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>

                <small id="password-error" style="color: red; display: none;">Password tidak cocok</small>

                <button type="submit">Daftar Sekarang</button>

                <p class="login-link">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
            </form>
        </div>
    </div>
<script>
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirmation');
    const errorText = document.getElementById('password-error');

    confirm.addEventListener('input', () => {
        if (password.value !== confirm.value) {
            errorText.style.display = 'block';
        } else {
            errorText.style.display = 'none';
        }
    });

    // Optional: Cegah submit kalau tidak cocok
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        if (password.value !== confirm.value) {
            e.preventDefault();
            errorText.style.display = 'block';
            confirm.focus();
        }
    });
</script>

</body>
</html>
