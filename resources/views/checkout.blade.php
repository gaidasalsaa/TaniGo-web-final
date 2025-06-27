<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - TaniGo</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/keranjang.css') }}">
    <style>
        .checkout-box {
            background-color: #f8f7e5;
            border-radius: 10px;
            padding: 25px;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .checkout-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .checkout-box h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .checkout-items-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .checkout-items-list li {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .checkout-form {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .checkout-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            resize: vertical;
            font-family: inherit;
            font-size: 14px;
        }

        .buy-button {
            width: 100%;
            padding: 12px;
            background-color: #3a5a1b;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #2d4716;
        }
    </style>
</head>
<body>
    <div class="container">
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

        <h1 class="checkout-title">Checkout</h1>

        <div class="checkout-box">
            <h3>Produk yang Dibeli:</h3>
            <ul class="checkout-items-list">
                <li>
                    <span>Porang (1x)</span>
                    <span>Rp. 35.000</span>
                </li>
                <li>
                    <span>Beras Porang (1x)</span>
                    <span>Rp. 45.000</span>
                </li>
            </ul>

            <div class="total">
                <span>Total:</span>
                <strong>Rp. 80.000</strong>
            </div>

            <form action="{{ route('checkout.process') }}" method="POST" class="checkout-form">
                @csrf

                <label for="alamat">Alamat Pengiriman:</label>
                <textarea name="alamat" id="alamat" rows="4" required></textarea>

                <label for="jasa_antar">Jasa Antar:</label>
                <select name="jasa_antar" id="jasa_antar" required>
                    <option value="">-- Pilih Jasa Antar --</option>
                    <option value="JNE">JNE</option>
                    <option value="J&T">J&T</option>
                    <option value="SiCepat">SiCepat</option>
                </select>

                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select name="metode_pembayaran" id="metode_pembayaran" required>
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="COD">COD</option>
                    <option value="QRIS">QRIS</option>
                </select>

                <button type="submit" class="buy-button">Konfirmasi & Bayar</button>
            </form>
        </div>
    </div>
</body>
</html>
