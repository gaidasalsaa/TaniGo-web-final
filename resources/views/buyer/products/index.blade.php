<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk | TaniGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Style Global + Produk -->
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/produk_pembeli.css') }}">
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <div class="navbar-container">
            <ul class="ul-navbar">
                <a href="{{ route('dashboard') }}" class="a-navbar">
                    <img src="{{ asset('dist/img/TaniGo_logo.png') }}" class="img-logo">
                </a> 
                <li class="li-navbar"><a href="{{ route('dashboard') }}" class="a-navbar">Home</a></li>
                <li class="li-navbar"><a href="{{ route('buyer.products.index') }}" class="a-navbar">Produk</a></li>
                <li class="li-navbar"><a href="/tentangkami" class="a-navbar">Tentang Kami</a></li>
                <li class="li-navbar"><a href="/keranjang" class="a-navbar">Keranjang</a></li>
                <li class="li-navbar">
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>

            <!-- Profil & Logout -->
            <div class="auth-navbar">
                    <a href="/profil" class="profile">
                        {{ Auth::user()->name }}
                        <img src="https://img.icons8.com/ios-glyphs/30/user--v1.png" alt="User Icon"/>
                    </a>
            </div>  
        </div>
        <!-- End Navbar -->

        <!-- Produk Section -->
        <div class="dashboard-container" style="padding-bottom: 40px;">
            <section class="produk-unggulan">
                <h2>Produk Unggulan</h2>
                <p class="subtext">Produk terbaik dari Desa Ngrayun</p>
                <div class="produk-container">
                    @forelse($products as $product)
                        <div class="produk-item">
                            {{-- Gambar produk --}}
                            <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}">

                            {{-- Nama dan harga --}}
                            <h4>{{ $product->nama_produk }}</h4>
                            <p>Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                            {{-- Bisa tambahkan data stok atau kategori jika mau --}}
                            <span>Stok: {{ $product->stok }}</span>

                            {{-- Tombol keranjang --}}
                            <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="add-to-cart-btn">Masukkan ke Keranjang</button>
                            </form>
                        </div>
                    @empty
                        <p>Tidak ada produk tersedia saat ini.</p>
                    @endforelse
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer>
            <div class="footer-logo">
                <img src="{{ asset('dist/img/TaniGo_logo.png') }}" class="img-logo">
            </div>
            <div class="footer-links">
                <a href="/produk">Produk</a>
                <a href="/tentang">Tentang Kami</a>
                <a href="/keranjang">Keranjang</a>
                <a href="https://wa.me/6281237527397" target="_blank">Hubungi Kami</a>
            </div>
            <div class="footer-location">
                <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="Lokasi">
                <a href="https://g.co/kgs/rVm2sN8" target="_blank">
                    Kecamatan Ngrayun, Kabupaten Ponorogo, Jawa Timur, Indonesia
                </a>
            </div>
            <div class="footer-credit">
                <p>© 2025 TaniGo</p>
            </div>
        </footer>
    </div>

    <!-- JS -->
    <script>
        function masukkanKeranjang(namaProduk) {
            alert("Produk '" + namaProduk + "' telah dimasukkan ke keranjang!");
        }
    </script>
</body>
</html>
