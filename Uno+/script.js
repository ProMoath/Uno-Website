document.addEventListener('DOMContentLoaded', () => {
    // Select the menu icon and navbar
    const menuIcon = document.querySelector('#menu-icon');
    const navbar = document.querySelector('.navbar');

    // Check if the elements exist
    if (menuIcon && navbar) {
        // Add a click event to the menu icon
        menuIcon.addEventListener('click', () => {
            // Toggle classes for the menu icon and navbar
            menuIcon.classList.toggle('fa-times'); // Change to "X" icon when active
            navbar.classList.toggle('active');    // Show or hide the menu
        });
    } else {
        console.error('Menu icon or navbar not found in the DOM.');
    }
    
});
