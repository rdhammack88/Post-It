$(document).ready(function() {
    $('#mainNav .navbar-nav a').on('click', function() {
        $('#mainNav .navbar-nav')
            .find('li.activeLink')
            .removeClass('activeLink');
        $(this)
            .parent('li')
            .addClass('activeLink');
    });

    (function() {
        console.log(window.location.pathname);
        if (window.location.pathname === '/') {
            console.log('home');
            $('.homeLink')
                .parent('li')
                .addClass('activeLink');
        } else if (window.location.pathname === '/login') {
            console.log('login');
            $('.loginLink')
                .parent('li')
                .addClass('activeLink');
            $('.homeLink')
                .parent('li')
                .removeClass('activeLink');
        } else if (window.location.pathname === '/register') {
            console.log('register');
            $('.signupLink')
                .parent('li')
                .addClass('activeLink');
            $('.homeLink')
                .parent('li')
                .removeClass('activeLink');
        }
    })();
});
