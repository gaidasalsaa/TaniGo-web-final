<!-- resources/views/seller/products/create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/create_product.css') }}">
</head>
<body>
    <div class="containeradm">
        @include('partials.sidebarSeller') <!-- Sidebar bisa dipisah untuk reuse -->

        <main class="mainadm">
            <header class="headeradm">
                <h2>Tambah Produk Baru</h2>
                <a href="#" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="form-section">
                <h3>Form Tambah Produk</h3>

                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" required>

                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" min="1" required>

                    <label for="harga">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" min="100" required>

                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"></textarea>

                    <!-- Form Upload Foto -->
                    <label for="foto">Foto Produk</label>
                    <input type="file" name="foto" id="foto" accept="image/*">

                    <button type="submit">Simpan Produk</button>
                </form>

            </section>
        </main>
    </div>

    <script>
        // Contoh interaktif: validasi input harga
        const hargaInput = document.getElementById('harga');
        hargaInput.addEventListener('input', function () {
            if (parseInt(this.value) < 100) {
                alert('Harga minimal Rp 100');
                this.value = 100;
            }
        });
    </script>
</body>
</html>
