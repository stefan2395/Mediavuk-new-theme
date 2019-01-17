$(document).ready(function () {
    $('.projects .filter-nav ul li button').addClass('project-button');
    $(function () {
    });
    // $('.portfolioTabsHover').on('click', function () {
    //     $('li.portfolioTabsHover').removeClass('portfolioTabsActive');
    //     $(this).addClass('portfolioTabsActive');
    // })
});
// $(document).ready(function () {
//     $('.project-button').on('click', function () {
//         $('.project-button').removeClass('active');
//         $(this).addClass('active');
//     });
// });
$(document).ready(function () {
    $('.hamburger').on('click', function (e) {
        e.preventDefault();
        $('#nav').toggleClass('isActive');
        $('body').toggleClass('isActive');
        $('body').toggleClass('noScroll');
    });
});
$(window).load(function () {
    $('.nav-toggle').removeClass('hide');
});