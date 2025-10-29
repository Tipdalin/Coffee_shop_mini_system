document.addEventListener('DOMContentLoaded', () => {
    const orderList = document.getElementById('order-list');
    const subTotalElem = document.getElementById('sub-total');
    const taxAmountElem = document.getElementById('tax-amount');
    const finalTotalElem = document.getElementById('final-total');
    const TAX_RATE = 0.10;

    // --- 1. Tab Switching ---
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.addEventListener('click', (e) => {
            // Update active state
            document.querySelectorAll('.category-tab').forEach(t => t.classList.remove('active'));
            e.target.classList.add('active');

            // Filter items
            const category = e.target.dataset.category;
            document.querySelectorAll('.product-card').forEach(card => {
                if (card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // --- 3. Calculation Function ---
    function updateTotals() {
        let subTotal = 0;
        // Iterate through all items currently in the cart
        document.querySelectorAll('.order-item').forEach(item => {
            const price = parseFloat(item.dataset.price);
            const qty = parseInt(item.dataset.qty);
            subTotal += price * qty;
        });

        const tax = subTotal * TAX_RATE;
        const total = subTotal + tax;

        subTotalElem.textContent = `$${subTotal.toFixed(2)}`;
        taxAmountElem.textContent = `$${tax.toFixed(3)}`; // Match image's precision
        finalTotalElem.textContent = `$${total.toFixed(3)}`; // Match image's precision
    }

    // --- 2. Add to Cart Functionality ---
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const card = e.target.closest('.product-card');
            const name = card.dataset.name;
            const price = parseFloat(card.dataset.price);
            
            let existingItem = document.querySelector(`.order-item[data-name="${name}"]`);

            if (existingItem) {
                // If item exists, just increase the quantity visually/in data (not implemented here)
                // For this design, we just add a new line item like the screenshot implies
                addItemToOrder(name, price);
            } else {
                addItemToOrder(name, price);
            }
            
            // Gen Z Pop Animation on click
            card.classList.add('animated-pop');
            setTimeout(() => card.classList.remove('animated-pop'), 300);
        });
    });

    function addItemToOrder(name, price) {
        // Create the new item element structure (like the red cards on the right)
        const newItem = document.createElement('div');
        newItem.classList.add('order-item', 'd-flex', 'justify-content-between', 'align-items-center', 'p-2', 'mb-2', 'rounded-3');
        newItem.setAttribute('data-name', name);
        newItem.setAttribute('data-price', price);
        newItem.setAttribute('data-qty', 1);
        newItem.style.backgroundColor = 'var(--genz-brown)'; // Use the dark background color

        newItem.innerHTML = `
            <div class="d-flex align-items-center">
                <img src="..." class="order-item-img me-2 rounded-2" style="width: 50px; height: 50px;" alt="${name}">
                <span class="order-item-name">${name}</span>
            </div>
            <span class="order-item-price text-pink">$${price.toFixed(2)}</span>
        `;
        
        // **Optional: Add a close/remove button for full functionality**
        
        orderList.appendChild(newItem);
        updateTotals();
    }
    
    // Initial call to hide non-coffee/snack items
    document.querySelectorAll('.product-card:not([data-category="coffee"])').forEach(card => {
        card.style.display = 'none';
    });
    updateTotals(); // Initialize totals at $0.00
});


