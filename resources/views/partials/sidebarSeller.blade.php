<!-- resources/views/partials/sidebarSeller.blade.php -->
<aside class="sidebaradm">
    <a href="{{ route('seller.dashboard') }}">
        <img src="{{ asset('dist/img/TaniGo_logo.png') }}" class="logoadm">
    </a>
    <nav class="navadm">
        <a href="{{ route('seller.dashboard') }}"
           class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">
           Dashboard
        </a>

        <a href="{{ route('products.index') }}"
           class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
           Kelola Produk
        </a>

        <a href="#"
           class="{{ request()->is('pesanan-masuk') ? 'active' : '' }}">
           Pesanan Masuk
        </a>

        <a href="#"
           class="{{ request()->is('riwayat-penjualan') ? 'active' : '' }}">
           Riwayat Penjualan
        </a>

        <a href="#"
           class="{{ request()->is('pengaturan') ? 'active' : '' }}">
           Pengaturan
        </a>

        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?');">
            @csrf
            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; padding: 0;">
               Logout
            </button>
         </form>
    </nav>
    <footer class="footeradm">
        <p>📧 tanigo@gmail.com</p>
        <p>© 2025 TaniGo</p>
    </footer>
</aside>
