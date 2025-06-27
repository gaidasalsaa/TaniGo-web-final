<!-- resources/views/seller/products/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/produk_index.css') }}">
</head>
<body>
    <div class="containeradm">
        @include('partials.sidebarSeller')

        <main class="mainadm">
            <header class="headeradm">
                <h2>Kelola Produk</h2>
                <a href="{{ route('seller.profile.edit') }}" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="dashboardadm">
                <div class="top-bar">
                    <h3>Daftar Produk Anda</h3>
                    <a href="{{ route('products.create') }}" class="btn-tambah">+ Tambah Produk</a>
                </div>

                @if (session('message'))
                    <div class="success-message">{{ session('message') }}</div>
                @endif

                <div class="produk-list">
                    <form action="{{ route('products.index') }}" method="GET" class="filter-form">
                        <label for="kategori">Filter Kategori:</label>
                        <select name="kategori" id="kategori" onchange="this.form.submit()">
                            <option value="semua" {{ request('kategori') == 'semua' ? 'selected' : '' }}>Semua</option>
                            <option value="mentah" {{ request('kategori') == 'mentah' ? 'selected' : '' }}>Produk Mentah</option>
                            <option value="setengah_jadi" {{ request('kategori') == 'setengah_jadi' ? 'selected' : '' }}>Produk Setengah Jadi</option>
                            <option value="jadi" {{ request('kategori') == 'jadi' ? 'selected' : '' }}>Produk Jadi</option>
                            <option value="kerajinan" {{ request('kategori') == 'kerajinan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                        </select>
                    </form>
                    <table class="produk-table">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $product->kategori)) }}</td>
                                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>
                                        @if ($product->foto)
                                            <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk" width="80">
                                        @else
                                            <span class="no-image">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-hapus">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="kosong">Belum ada produk yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
