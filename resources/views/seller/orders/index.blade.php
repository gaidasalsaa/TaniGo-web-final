<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Masuk | TaniGo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard_seller.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/orders.css') }}">
</head>
<body>
    <div class="containeradm">
        @include('partials.sidebarSeller')

        <main class="mainadm">
            <header class="headeradm">
                <h2>Pesanan Masuk</h2>
                <a href="{{ route('seller.profile.edit') }}" class="useradm">👤 {{ Auth::user()->name }} ▾</a>
            </header>

            <section class="order-section">
                <h3>Daftar Pesanan Terbaru</h3>

                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">#ORD20250627-001</span>
                        <span class="order-status status-pending">Menunggu Konfirmasi</span>
                    </div>
                    <div class="order-body">
                        <p><strong>Pembeli:</strong> Lestari</p>
                        <p><strong>Produk:</strong> Keripik Porang (3 pcs)</p>
                        <p><strong>Total:</strong> Rp 45.000</p>
                        <p><strong>Tanggal:</strong> 27 Juni 2025, 16:45 WIB</p>
                        <div class="action-btn">
                            <button class="btn-proses" onclick="konfirmasiPesanan(this)">Konfirmasi Pesanan</button>
                        </div>
                    </div>
                </div>

                <div class="order-card">
                    <div class="order-header">
                        <span class="order-id">#ORD20250627-002</span>
                        <span class="order-status status-proses">Sedang Diproses</span>
                    </div>
                    <div class="order-body">
                        <p><strong>Pembeli:</strong> Budi Santoso</p>
                        <p><strong>Produk:</strong> Tas Anyam (1 pcs)</p>
                        <p><strong>Total:</strong> Rp 78.000</p>
                        <p><strong>Tanggal:</strong> 27 Juni 2025, 15:20 WIB</p>
                        <div class="action-btn">
                            <button class="btn-proses" onclick="kirimPesanan(this)">Tandai Sudah Dikirim</button>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>

    <script>
        function konfirmasiPesanan(button) {
            const card = button.closest('.order-card');
            const statusSpan = card.querySelector('.order-status');
            statusSpan.textContent = 'Sedang Diproses';
            statusSpan.className = 'order-status status-proses';

            button.textContent = 'Tandai Sudah Dikirim';
            button.setAttribute('onclick', 'kirimPesanan(this)');
        }

        function kirimPesanan(button) {
            const card = button.closest('.order-card');
            const statusSpan = card.querySelector('.order-status');
            statusSpan.textContent = 'Selesai';
            statusSpan.className = 'order-status status-selesai';

            button.remove(); // Hilangkan tombol
        }
    </script>
</body>
</html>
