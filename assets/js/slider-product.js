$(function () {
    // Owl Carousel
    var owl = $(".owl-carousel");
    owl.owlCarousel({
        items: 5,
        margin: 34,
        loop: false,
        nav: true,
        navText: [
            `<div class='move-product-right move-product-right--man'>
                <i class='fa-solid fa-arrow-right'></i>
            </div>`,
            `<div class="move-product-left move-product-left--man">
                <i class="fa-solid fa-arrow-left"></i>
            </div>`,
        ],
        responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
    });
});
