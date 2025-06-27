<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran - TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
    <style>
        .confirmation-box {
            background-color: #f8f7e5;
            border-radius: 10px;
            padding: 25px;
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .confirmation-box h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .summary {
            text-align: left;
            margin-bottom: 20px;
        }

        .summary p {
            font-size: 16px;
            margin: 6px 0;
        }

        .barcode {
            margin-top: 20px;
        }

        .barcode img {
            width: 200px;
            height: 200px;
        }

        .back-button {
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #3a5a1b;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #2d4716;
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Terima kasih, {{ Auth::user()->name }}!</h2>

        <div class="summary">
            <p><strong>Produk:</strong> Porang (1x), Beras Porang (1x)</p>
            <p><strong>Total:</strong> Rp 80.000</p>
            <p><strong>Alamat Pengiriman:</strong> {{ $alamat }}</p>
            <p><strong>Jasa Antar:</strong> {{ $jasa_antar }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $metode_pembayaran }}</p>
        </div>

        @if($metode_pembayaran === 'QRIS')
        <div class="barcode">
            <p>Silakan scan kode QR berikut untuk menyelesaikan pembayaran:</p>
            <img src="{{ asset('dist/img/barcode_dummy.png') }}" alt="QRIS Barcode">
        </div>
        @else
        <div class="barcode">
            <p>Silakan lanjutkan pembayaran sesuai instruksi untuk metode: <strong>{{ $metode_pembayaran }}</strong>.</p>
        </div>
        @endif

        <a href="{{ route('dashboard') }}" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>
