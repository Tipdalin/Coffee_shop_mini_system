/**
 * JavaScript to handle the dynamic activation of sidebar and offcanvas navigation links.
 * This script now ensures the correct link is highlighted and then manually triggers navigation.
 */

document.addEventListener('DOMContentLoaded', () => {
    // Select all navigation links across both the sidebar and the offcanvas menu.
    const navLinks = document.querySelectorAll('.nav-link.rounded-pill');

    if (navLinks.length === 0) {
        console.warn("No navigation links found with class '.nav-link.rounded-pill'.");
        return;
    }

    // Function to handle the active class update
    const activateLink = (clickedLink) => {
        // 1. Remove 'active' class from all links
        navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // 2. Add 'active' class to the clicked link's target (itself and its counterpart)
        const href = clickedLink.getAttribute('href');
        
        // Find all links that share the same href and activate them
        document.querySelectorAll(`.nav-link[href="${href}"]`).forEach(link => {
            link.classList.add('active');
        });

        // 3. If in offcanvas, close the offcanvas menu after selection (improves mobile UX)
        const offcanvasElement = document.getElementById('offcanvasSidebar');
        if (clickedLink.closest('#offcanvasSidebar') && offcanvasElement) {
            const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement) || new bootstrap.Offcanvas(offcanvasElement);
            bsOffcanvas.hide();
        }

        return href; // Return the href to allow navigation
    };

    // Attach event listeners to all links
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            // Stop the default navigation action
            e.preventDefault(); 
            
            // Get the target URL after activating the link state
            const targetUrl = activateLink(link);
            
            // Manually trigger navigation
            if (targetUrl && targetUrl !== '#' && targetUrl !== window.location.pathname) {
                window.location.href = targetUrl;
            }
        });
    });

    // Highlight the correct link on initial load based on current URL path
    const currentPath = window.location.pathname;
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            // We use the full activation logic here for consistency
            activateLink(link); 
        }
    });

});
