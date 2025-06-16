// Cart functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart if not exists
    if (!sessionStorage.getItem('cart')) {
        sessionStorage.setItem('cart', JSON.stringify([]));
    }

    // Add to cart buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            const productName = this.dataset.name || 'Product';
            const productPrice = parseFloat(this.dataset.price) || 0;
            const productImage = this.dataset.image || '';

            addToCart({
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            });

            showToast(`${productName} added to cart!`);
        });
    });

    // Cart toggle functionality
    const cartToggle = document.querySelector('.cart-btn');
    const cartSidebar = document.getElementById('cart-sidebar');
    const cartOverlay = document.getElementById('cart-overlay');

    if (cartToggle && cartSidebar && cartOverlay) {
        cartToggle.addEventListener('click', toggleCart);
        cartOverlay.addEventListener('click', toggleCart);
        
        // Load cart items when sidebar opens
        cartSidebar.addEventListener('click', function(e) {
            if (e.target.classList.contains('close-cart') || 
                e.target.classList.contains('checkout-btn')) {
                toggleCart();
            }
        });
    }

    renderCartItems();
});

function toggleCart() {
    document.getElementById('cart-sidebar').classList.toggle('active');
    document.getElementById('cart-overlay').classList.toggle('active');
    document.body.classList.toggle('no-scroll');
    
    if (document.getElementById('cart-sidebar').classList.contains('active')) {
        renderCartItems();
    }
}

function addToCart(product) {
    const cart = JSON.parse(sessionStorage.getItem('cart'));
    const existingItem = cart.find(item => item.id === product.id);

    if (existingItem) {
        existingItem.quantity += product.quantity;
    } else {
        cart.push(product);
    }

    sessionStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

function removeFromCart(productId) {
    let cart = JSON.parse(sessionStorage.getItem('cart'));
    cart = cart.filter(item => item.id !== productId);
    sessionStorage.setItem('cart', JSON.stringify(cart));
    
    updateCartCount();
    renderCartItems();
    showToast('Item removed from cart');
}

function updateCartItem(productId, quantity) {
    if (quantity < 1) return;

    const cart = JSON.parse(sessionStorage.getItem('cart'));
    const item = cart.find(item => item.id === productId);

    if (item) {
        item.quantity = quantity;
        sessionStorage.setItem('cart', JSON.stringify(cart));
        renderCartItems();
    }
}

function renderCartItems() {
    const cart = JSON.parse(sessionStorage.getItem('cart'));
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');

    if (!cartItemsContainer) return;

    cartItemsContainer.innerHTML = '';

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p class="empty-cart">Your cart is empty</p>';
        if (cartTotalElement) cartTotalElement.textContent = '0.00';
        return;
    }

    let total = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const itemElement = document.createElement('div');
        itemElement.className = 'cart-item';
        itemElement.innerHTML = `
            <div class="cart-item-img">
                <img src="${item.image}" alt="${item.name}">
            </div>
            <div class="cart-item-details">
                <h4>${item.name}</h4>
                <p>$${item.price.toFixed(2)}</p>
                <div class="quantity-controls">
                    <button class="quantity-btn minus" data-id="${item.id}">-</button>
                    <span class="quantity">${item.quantity}</span>
                    <button class="quantity-btn plus" data-id="${item.id}">+</button>
                </div>
            </div>
            <div class="cart-item-actions">
                <button class="remove-item" data-id="${item.id}">
                    <i class="fas fa-trash"></i>
                </button>
                <p class="item-total">$${itemTotal.toFixed(2)}</p>
            </div>
        `;

        cartItemsContainer.appendChild(itemElement);
    });

    // Add event listeners to new elements
    document.querySelectorAll('.quantity-btn.minus').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const item = cart.find(item => item.id === id);
            if (item && item.quantity > 1) {
                updateCartItem(id, item.quantity - 1);
            }
        });
    });

    document.querySelectorAll('.quantity-btn.plus').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const item = cart.find(item => item.id === id);
            if (item) {
                updateCartItem(id, item.quantity + 1);
            }
        });
    });

    document.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', function() {
            removeFromCart(this.dataset.id);
        });
    });

    if (cartTotalElement) cartTotalElement.textContent = total.toFixed(2);
}

function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('show');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

function checkout() {
    // In a real app, this would redirect to checkout page
    alert('Proceeding to checkout!');
    sessionStorage.removeItem('cart');
    updateCartCount();
    renderCartItems();
    toggleCart();
}