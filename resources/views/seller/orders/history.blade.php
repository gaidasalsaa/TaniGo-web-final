<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Penjualan | TaniGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/riwayat.css') }}">
</head>
<body>
    <div class="containeradm">
        @include('partials.sidebarSeller')

        <main class="mainadm">
            <header class="headeradm">
                <h2>Riwayat Penjualan</h2>
                <a href="{{ route('seller.profile.edit') }}" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="order-section">
                <h3>Pesanan yang Sudah Selesai</h3>

                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">#ORD20250626-003</span>
                        <span class="order-status status-selesai">Selesai</span>
                    </div>
                    <div class="order-body">
                        <p><strong>Pembeli:</strong> Sari Dewi</p>
                        <p><strong>Produk:</strong> Porang (2 pcs)</p>
                        <p><strong>Total:</strong> Rp 70.000</p>
                        <p><strong>Tanggal:</strong> 6 Juni 2025, 14:10 WIB</p>
                    </div>
                </div>

                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">#ORD20250625-004</span>
                        <span class="order-status status-selesai">Selesai</span>
                    </div>
                    <div class="order-body">
                        <p><strong>Pembeli:</strong> Wahyu Purnomo</p>
                        <p><strong>Produk:</strong> Tas Anyam (1 pcs)</p>
                        <p><strong>Total:</strong> Rp 78.000</p>
                        <p><strong>Tanggal:</strong> 13 Juni 2025, 11:45 WIB</p>
                    </div>
                </div>
                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">#ORD20250625-004</span>
                        <span class="order-status status-selesai">Selesai</span>
                    </div>
                    <div class="order-body">
                        <p><strong>Pembeli:</strong> Agus</p>
                        <p><strong>Produk:</strong> Keripik Porang (4 pcs)</p>
                        <p><strong>Total:</strong> Rp 60.000</p>
                        <p><strong>Tanggal:</strong> 15 Juni 2025, 17:07 WIB</p>
                    </div>
                </div>

            </section>
        </main>
    </div>
</body>
</html>
