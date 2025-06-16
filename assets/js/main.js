// Main application functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.createElement('button');
    mobileMenuToggle.className = 'mobile-menu-toggle';
    mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
    document.querySelector('.nav-container').prepend(mobileMenuToggle);
    
    mobileMenuToggle.addEventListener('click', function() {
        document.querySelector('.nav-menu').classList.toggle('active');
        this.classList.toggle('open');
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initialize cart count from sessionStorage
    updateCartCount();

    // Product filter highlighting
    const currentCategory = new URLSearchParams(window.location.search).get('category') || 'all';
    document.querySelectorAll('.filter-btn').forEach(btn => {
        if (btn.textContent.toLowerCase() === currentCategory) {
            btn.classList.add('active');
        }
    });
});

function updateCartCount() {
    const cart = JSON.parse(sessionStorage.getItem('cart') || '[]');
    const countElement = document.getElementById('cart-count');
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    
    if (countElement) {
        countElement.textContent = count;
        countElement.style.display = count > 0 ? 'inline-block' : 'none';
    }
}