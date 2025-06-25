<!DOCTYPE html>
<html lang="id">
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

    <title>TaniGo Dashboard</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <!-- navigation bar -->
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
        <!-- navigation bar selesai -->

        <!-- content 1 -->
        <div class="container-content">
            <div class="welcome-box">
                <h1>Sugeng Rawuh, {{ Auth::user()->name }}!</h1>
                <p>Selamat datang di dashboard TaniGo!</p>
            </div>
        </div>

        <!-- Produk -->
        <div class="dashboard-container">
            <section class="produk-unggulan">
                <h2>Kategori Produk</h2>
                <p class="subtext">Produk yang dikelola oleh BUMDES dan PKK Desa Ngrayun</p>
                <div class="produk-container">
                    <div class="produk-item">
                        <a href="/produkMentah" class="a-navbar">
                            <img src="{{ asset('dist/img/BarangMentah.png') }}" alt="Produk Mentah">
                        </a>
                        <p>Produk Mentah</p>
                    </div>
                    <div class="produk-item">
                        <a href="/produkSetengahJadi" class="a-navbar">
                            <img src="{{ asset('dist/img/BahanSetengahJadi.png') }}" alt="Produk Setengah Jadi">
                        </a>
                        <p>Produk Setengah Jadi</p>
                    </div>
                    <div class="produk-item">
                        <a href="/produkJadi" class="a-navbar">
                            <img src="{{ asset('dist/img/BarangJadi.png') }}" alt="Produk Jadi">
                        </a>
                        <p>Produk Jadi</p>
                    </div>
                    <div class="produk-item">
                        <a href="/kerajinanTangan" class="a-navbar">
                            <img src="{{ asset('dist/img/KerajinanTangan.png') }}" alt="Kerajinan Tangan">
                        </a>
                        <p>Kerajinan Tangan</p>
                    </div>
                </div>
            </section>

            <!-- Destinasi Wisata -->
            <section class="produk-unggulan">
                <h2>Destinasi Wisata</h2>
                <p class="subtext">Destinasi Wisata yang Menarik untuk Dikunjungi di Desa Ngrayun Kabupaten Ponorogo</p>
                <div class="produk-container">
                    <div class="wisata-item"> 
                        <a href="javascript:void(0);" class="a-navbar" onclick="showPopup()">
                            <img src="{{ asset('dist/img/WatuSemaur.jpg') }}" alt="Watu Semaur">
                        </a>
                        <p>Watu Semaur</p>
                    </div>
                    <div class="wisata-item"> 
                        <a href="javascript:void(0);" class="a-navbar" onclick="showPopup()">
                            <img src="{{ asset('dist/img/watuPutih.jpg') }}" alt="Watu Putih">
                        </a>
                        <p>Watu Putih</p>
                    </div>
                    <div class="wisata-item"> 
                        <a href="javascript:void(0);" class="a-navbar" onclick="showPopup()">
                            <img src="{{ asset('dist/img/WatuSemaur.jpg') }}" alt="Watu Semaur">
                        </a>
                        <p>Watu Semaur</p>
                    </div>
                    <div class="wisata-item"> 
                        <a href="javascript:void(0);" class="a-navbar" onclick="showPopup()">
                            <img src="{{ asset('dist/img/WatuSemaur.jpg') }}" alt="Watu Semaur">
                        </a>
                        <p>Watu Semaur</p>
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
    <!-- JS Popup -->
    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

    <!-- Popup Overlay -->
    <div id="popup" class="popup-overlay" onclick="closePopup(event)">
        <div class="popup-content" onclick="event.stopPropagation();">
            <span class="popup-close" onclick="closePopup(event)">&times;</span>
            <h2>Watu Semaur</h2>
            <p>Watu Semaur adalah destinasi wisata alam di Ngrayun yang menawarkan keindahan tebing, sungai, dan panorama alam yang memukau.</p>
            <a href="https://www.google.com/maps/dir//Krajan,+Selur,+Ngrayun,+Ponorogo+Regency,+East+Java+63464/@-8.1086909,111.396365,12.12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e79132b26afb483:0xc5078a0e6cb0edf1!2m2!1d111.4775071!2d-8.1110092?entry=ttu&g_ep=EgoyMDI1MDYyMi4wIKXMDSoASAFQAw%3D%3D" 
            target="_blank">Lihat Lokasi di Google Maps</a>
        </div>
    </div>
</body>
</html>
