function addToCart(id, nom, prix) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let item = cart.find(p => p.id === id);
    if (item) {
        item.quantite++;
    } else {
        cart.push({ id, nom, prix, quantite: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

function displayCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartItems = document.getElementById('cart-items');
    cartItems.innerHTML = '';

    if (cart.length === 0) {
        cartItems.innerHTML = '<li class="text-center text-gray-500">Votre panier est vide.</li>';
        return;
    }

    cart.forEach(item => {
        cartItems.innerHTML += `
            <li class="flex justify-between items-center border-b pb-2">
                <div>
                    <button onclick="removeItem(${item.id})" class="text-[#af2127] font-semibold">X</button>
                    <span>${item.nom} - ${item.prix} €</span>
                </div>
                <div class="flex items-center">
                    <button onclick="updateQuantity(${item.id}, -1)" class="bg-[#af2127] text-white px-2 mx-1 rounded">-</button>
                    <span class="font-semibold mx-2">${item.quantite}</span>
                    <button onclick="updateQuantity(${item.id}, 1)" class="bg-[#00253e] text-white px-2 mx-1 rounded">+</button>
                </div>
            </li>
        `;
    });
}

function updateQuantity(id, change) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let item = cart.find(p => p.id === id);
    if (item) {
        item.quantite += change;
        if (item.quantite <= 0) {
            cart = cart.filter(p => p.id !== id);
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }
}

function removeItem(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(p => p.id !== id);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

displayCart();