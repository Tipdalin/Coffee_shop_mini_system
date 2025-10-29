// Listener for the "Edit" buttons in the table
$('.edit-btn').on('click', function() {
    const btn = $(this);
    const productId = btn.data('id');

    // **Updated: Get base URL from window object**
    const updateRoute = window.productUpdateBaseUrl.replace('REPLACE_ID', productId); 

    // Set modal title and buttons
    // ... rest of the edit logic ...
});