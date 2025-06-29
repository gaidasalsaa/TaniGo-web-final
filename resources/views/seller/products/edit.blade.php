<!-- resources/views/seller/products/edit.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/create_product.css') }}">
</head>
<body>
    <div class="containeradm">
        @include('partials.sidebarSeller')

        <main class="mainadm">
            <header class="headeradm">
                <h2>Edit Produk</h2>
                <a href="{{ route('seller.settings.edit') }}" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="form-section">
                <h3>Form Edit Produk</h3>

                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" required>

                    <label for="kategori">Kategori Produk</label>
                    <select name="kategori" id="kategori" required>
                        <option value="mentah" {{ $product->kategori == 'mentah' ? 'selected' : '' }}>Produk Mentah</option>
                        <option value="setengah_jadi" {{ $product->kategori == 'setengah_jadi' ? 'selected' : '' }}>Produk Setengah Jadi</option>
                        <option value="jadi" {{ $product->kategori == 'jadi' ? 'selected' : '' }}>Produk Jadi</option>
                        <option value="kerajinan" {{ $product->kategori == 'kerajinan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                    </select>

                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" min="1" value="{{ old('stok', $product->stok) }}" required>

                    <label for="harga">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" min="100" value="{{ old('harga', $product->harga) }}" required>

                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>

                    <label for="foto">Ganti Foto Produk (Opsional)</label>
                    <input type="file" name="foto" id="foto" accept="image/*">

                    @if ($product->foto)
                        <p>Foto Saat Ini:</p>
                        <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk" width="120">
                    @endif

                    <button type="submit">Perbarui Produk</button>
                </form>
            </section>
        </main>
    </div>

    <script>
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
