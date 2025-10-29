document.addEventListener('DOMContentLoaded', () => {
    // 1. Select all product buttons that trigger the 'add to cart' action
    const productButtons = document.querySelectorAll('.product-action-btn');
    const cartCounter = document.querySelector('.cart-link .cart-count'); // Assuming you add a counter span to the cart icon

    // 2. Main function to handle adding an item
    const handleAddToCart = async (event) => {
        // Prevent default form/link action if applicable
        event.preventDefault(); 
        
        // Get the product ID or details from the button's data attribute (You must add this to your HTML)
        const button = event.currentTarget;
        const productId = button.dataset.productId; // e.g., <button data-product-id="123" ...>

        if (!productId) {
            console.error('Product ID not found on the button.');
            return;
        }

        // --- Frontend Feedback (Immediate UX) ---
        button.disabled = true;
        button.innerHTML = '<i class="bi bi-check-circle-fill"></i>'; // Change icon to a checkmark

        // --- 3. AJAX Call to Laravel Backend ---
        try {
            const response = await fetch('/api/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // CSRF token is crucial for Laravel security
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            });

            const data = await response.json();

            if (response.ok) {
                // 4. Update the cart counter on success
                if (cartCounter) {
                    // Update the cart total items count (assuming the API returns the new total)
                    cartCounter.textContent = data.new_cart_count; 
                }

                // Optional: Trigger a refresh of the order sidebar partial (via AJAX or framework)
                console.log('Product added successfully. Cart items:', data.new_cart_count);
            } else {
                console.error('Failed to add item to cart:', data.message);
                alert('Oops! Could not add item. Try again.');
            }

        } catch (error) {
            console.error('Network or server error:', error);
            alert('A connection error occurred.');
        } finally {
            // Reset the button after a short delay (for visual confirmation)
            setTimeout(() => {
                button.disabled = false;
                button.innerHTML = '<i class="bi bi-heart"></i><i class="bi bi-plus-circle"></i>'; // Reset icons
            }, 1000);
        }
    };

    // 5. Attach the event listener to all buttons
    productButtons.forEach(button => {
        button.addEventListener('click', handleAddToCart);
    });
});