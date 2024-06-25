document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.custom-menu-toggle');
    var menu = document.querySelector('.custom-menu');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('active');
        });
    }
});