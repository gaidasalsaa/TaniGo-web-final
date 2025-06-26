<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Penjual | TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="containeradm">
        <!-- Sidebar -->
        <aside class="sidebaradm">
            <a href="#">
                <img src="{{ asset('dist/img/TaniGo_logo.png') }}" class="logoadm">
            </a>
            <nav class="navadm">
                <a class="active">Dashboard</a>
                <a href="{{ route('products.index') }}">Kelola Produk</a>
                <a href="#">Pesanan Masuk</a>
                <a href="#">Riwayat Penjualan</a>
                <a href="#">Pengaturan</a>
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?');">
                    @csrf
                    <button type="submit" class="navadm-link">Logout</button>
                </form>


            </nav>
            <footer class="footeradm">
                <p>📧 tanigo@gmail.com</p>
                <p>© 2025 TaniGo</p>
            </footer>
        </aside>

        <!-- Main Content -->
        <main class="mainadm">
            <header class="headeradm">
                <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                <a href="#" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="dashboardadm">
                <h3>Dashboard</h3>
                <div class="statsadm">
                    <div class="stat-cardadm brown">Total Produk <span>15</span></div>
                    <div class="stat-cardadm green">Produk Terjual <span>1.245</span></div>
                    <div class="stat-cardadm blue">Pendapatan <span>Rp 12.300.000</span></div>
                </div>
            </section>

            <section class="aktivitasadm">
                <h3>Aktivitas Terbaru</h3>
                <div class="logadm" id="logContainer">
                    <p><strong>08:45</strong> – Anda menambahkan produk "Kopi Arabika 250gr"</p><hr>
                    <p><strong>09:10</strong> – Anda memperbarui stok "Beras Organik 1kg" menjadi 30</p><hr>
                    <p><strong>09:30</strong> – Anda menerima pesanan baru #TRX1325</p>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Contoh: efek klik interaktif (bisa dikembangkan dengan animasi lebih lanjut)
        document.querySelectorAll('.stat-cardadm').forEach(card => {
            card.addEventListener('click', () => {
                alert('Fitur ini sedang dikembangkan...');
            });
        });
    </script>
</body>
</html>
