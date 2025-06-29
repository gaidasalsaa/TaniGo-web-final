<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Profil | TaniGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/settings.css') }}">
</head>
<body>
    <div class="containeradm">
        <main class="mainadm">
            <header class="headeradm">
                <h2>Update Profil</h2>
                <a href="{{ route('buyer.settings.edit') }}" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="setting-section">

                {{-- Notifikasi Sukses --}}
                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                {{-- Error Validasi --}}
                @if ($errors->any())
                    <div class="alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('buyer.settings.update') }}" enctype="multipart/form-data" class="setting-form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="Laki-laki" {{ Auth::user()->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ Auth::user()->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}">
                    </div>

                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" name="kota" value="{{ old('kota', Auth::user()->kota) }}">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat">{{ old('alamat', Auth::user()->alamat) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Foto Profil</label>
                        @if(Auth::user()->foto_profil)
                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Foto Profil" width="100" style="margin-bottom: 10px; border-radius: 8px;">
                        @endif
                        <input type="file" name="foto_profil" accept="image/*">
                    </div>

                    <hr>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" placeholder="Isi jika ingin mengubah password">
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation">
                    </div>

                    <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                </form>

            </section>
        </main>
    </div>
</body>
</html>
