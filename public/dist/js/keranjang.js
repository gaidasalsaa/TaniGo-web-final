const cartItems = [
    {
        name: "Sayur Bayam",
        price: 5000,
        img: "dist/img/bayam.png"
    },
    {
        name: "Jagung Manis",
        price: 8000,
        img: "dist/img/jagung.png"
    }
];

function formatRupiah(number) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(number);
}

function renderCart() {
    const container = document.getElementById("cart-items");
    const totalEl = document.getElementById("total-harga");

    let total = 0;
    container.innerHTML = '';

    cartItems.forEach(item => {
        total += item.price;

        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `
            <img src="${item.img}" alt="${item.name}">
            <div class="item-details">
                <p class="item-title">${item.name}</p>
                <p class="item-price">${formatRupiah(item.price)}</p>
            </div>
        `;
        container.appendChild(div);
    });

    totalEl.textContent = formatRupiah(total);
}

document.addEventListener("DOMContentLoaded", renderCart);
