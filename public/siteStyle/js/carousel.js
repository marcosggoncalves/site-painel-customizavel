$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        autoplay: true,
        rewind: true,
        autoplayTimeout: 2500,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            }
        }
    });
});