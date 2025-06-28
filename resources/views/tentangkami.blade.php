<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaniGo - Tentang Kami</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tentangkami.css') }}">
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
            <div class="auth-navbar">
                <a href="/profil" class="profile">
                    {{ Auth::user()->name }}
                    <img src="https://img.icons8.com/ios-glyphs/30/user--v1.png" alt="User Icon"/>
                </a>
            </div>
        </div>

        <!-- Tentang Kami Section -->
        <div class="dashboard-container">
            <section class="container-content tentangkami-section">
                <div class="tentangkami-header">
                    <img src="{{ asset('dist/img/petaNgrayun.png') }}" alt="Peta Ngrayun" class="tentangkami-map">
                    <div class="tentangkami-desc">
                        <h2>Tentang Kami</h2>
                        <h3>Platform TaniGo</h3>
                        <p>TaniGo merupakan platform digital yang bertujuan menghubungkan petani lokal dari Ngrayun, Ponorogo, dengan konsumen di seluruh Indonesia. Kami percaya bahwa pertanian adalah masa depan, dan teknologi adalah jembatannya.</p>
                        <h3>Visi Kami</h3>
                        <p>Menjadi jembatan digital yang memperkuat kesejahteraan petani lokal dan menjadikan pertanian Indonesia lebih berdaya.</p>
                    </div>
                </div>
            </section>
            
            <section class="container-content misi-section">
                <h3 class="misi-title">Misi</h3>
                <div class="misi-grid">
                    <div class="misi-card">
                        <h4>1</h4>
                        <p>Memberdayakan petani lokal dengan akses pemasaran yang lebih luas.</p>
                    </div>
                    <div class="misi-card">
                        <h4>2</h4>
                        <p>Meningkatkan transparansi dan keadilan dalam rantai pasok hasil bumi.</p>
                    </div>
                    <div class="misi-card">
                        <h4>3</h4>
                        <p>Menghubungkan konsumen dengan produk pertanian segar berkualitas langsung dari sumbernya.</p>
                    </div>
                </div>
            </section>
            <section class="container-content misi-section">
                <h3 class="misi-title">Ngrayun, Kabupaten Ponorogo</h3>
                <div class="misi-grid">
                    <div class="misi-card">
                        <h4>Batas Wilayah</h4>
                        <p>sebelah utara: Kecamatan Bungkal dan Kecamatan Sambit</p>
                        <p>sebelah timur: Kec. Sambit dan Kec. Pule Kab. Trenggalek</p>
                        <p>sebelah selatan: Kec. Pule Kab. Trenggalek</p>
                        <p>sebelah barat: Kec. Slahung dan Kec. Gemaharjo Kab. Pacitan</p>
                    </div>
                    <div class="misi-card">
                        <h4>Jumlah Desa</h4>
                        <p>1.  Desa Ngrayun | 2.  Desa Baosanlor</p>
                        <p>3.  Desa Baosan Kidul | 4.  Desa Mrayan</p>
                        <p>5.  Desa Binade | 6.  Desa Selur</p>
                        <p>7.  Desa Cepoko | 8.  Desa Temon</p>
                        <p>9.  Desa Sendang | 10. Desa Wonodadi</p>
                        <p>11. Desa Gedangan</p>
                    </div>
                    <div class="misi-card">
                        <h4>Letak Geografis</h4>
                        <p>Wilayah Kecamatan Ngrayun sebagian besar adalah daerah pegunungan terletak 
                            pada 8°1’39”S dan 111°28’1”E serta ketinggian kurang lebih 700 meter diatas 
                            permukaan air laut dengan luas wilayah 184,76 km², jarak Kantor Camat Ngrayun 
                            dengan Ibukota Kabupaten Ponorogo adalah 30 Km</p>
                    </div>
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
</body>
</html>

