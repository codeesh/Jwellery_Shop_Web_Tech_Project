// Admin dashboard functionality
document.addEventListener('DOMContentLoaded', function() {
    // Product form submission
    const productForm = document.getElementById('admin-form');
    if (productForm) {
        productForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const productData = {
                name: formData.get('name'),
                description: formData.get('description'),
                price: parseFloat(formData.get('price')),
                category: formData.get('category'),
                image: formData.get('image'),
                featured: formData.get('featured') === 'on'
            };

            // In a real app, this would make an API call
            console.log('Adding product:', productData);
            alert(`Product "${productData.name}" added successfully!`);
            this.reset();
        });
    }

    // Toggle admin panel (if you have this feature)
    const adminToggle = document.getElementById('admin-toggle');
    if (adminToggle) {
        adminToggle.addEventListener('click', function() {
            document.getElementById('admin-panel').classList.toggle('active');
        });
    }

    // Product search functionality
    const productSearch = document.getElementById('product-search');
    if (productSearch) {
        productSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            document.querySelectorAll('.product-item').forEach(item => {
                const productName = item.querySelector('h4').textContent.toLowerCase();
                item.style.display = productName.includes(searchTerm) ? 'block' : 'none';
            });
        });
    }
});

// Image preview for admin product form
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image-preview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}