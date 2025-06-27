<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaniGo - Tentang Kami</title>
    <link rel="stylesheet" href="{{ asset('dist/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/keranjang.css') }}">
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

  <main class="container">
    <h1 class="judul-keranjang">Keranjang</h1>
    <div class="cart-content">
      <aside class="cart-summary">
        <label><input type="checkbox" id="select-all" /> Pilih semua</label>
        <div class="summary-box">
            <h3>Ringkasan belanja</h3>
            <form id="checkout-form" method="POST" action="{{ route('checkout.show') }}">
                @csrf
                <input type="hidden" name="cart_ids" id="selected-cart-ids">
                <div class="total">
                    <span>Total</span>
                    <strong id="total-price">Rp. 0</strong>
                </div>
                <button type="submit" class="buy-button">Beli (<span id="selected-count">0</span>)</button>
            </form>

        </div>
      </aside>

      <section class="cart-items">
        @foreach ($carts as $cart)
        <div class="cart-item">
            <img class="item-img" src="{{ asset('storage/' . $cart->product->foto) }}" alt="{{ $cart->product->nama_produk }}">

            <div class="item-info">
                <div class="item-header">
                    <input type="checkbox" class="item-checkbox" data-price="{{ $cart->product->harga }}" data-id="{{ $cart->id }}">
                    <div>
                        <p class="item-name">{{ $cart->product->nama_produk }}</p>
                        <p class="item-weight">{{ $cart->product->unit ?? '1 pcs' }}</p>
                    </div>
                </div>

                <div class="item-footer">
                    <div class="item-price">Rp. {{ number_format($cart->product->harga, 0, ',', '.') }}</div>
                    <div class="item-qty">
                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" style="display: flex; gap: 6px;">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="quantity" value="{{ $cart->quantity - 1 }}">-</button>
                            <span>{{ $cart->quantity }}</span>
                            <button type="submit" name="quantity" value="{{ $cart->quantity + 1 }}">+</button>
                        </form>
                        <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

      </section>
    </div>
  </main>
  <!-- JS: Pilih Semua -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAllCheckbox = document.querySelector('#select-all');
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            const totalPriceEl = document.querySelector('#total-price');
            const selectedCountEl = document.querySelector('#selected-count');
            const selectedCartIds = document.querySelector('#selected-cart-ids');

            function formatRupiah(amount) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
            }

            function updateSummary() {
                let total = 0;
                let count = 0;
                let ids = [];

                itemCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const price = parseInt(checkbox.dataset.price);
                        const cartId = checkbox.dataset.id;
                        total += price;
                        count += 1;
                        ids.push(cartId);
                    }
                });

                totalPriceEl.textContent = formatRupiah(total);
                selectedCountEl.textContent = count;
                selectedCartIds.value = ids.join(',');
            }

            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSummary);
            });

            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function () {
                    itemCheckboxes.forEach(checkbox => {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                    updateSummary();
                });
            }

            updateSummary(); // Init on page load
        });
    </script>
</body>
</html>
