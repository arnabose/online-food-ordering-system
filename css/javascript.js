
var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay:4000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop:true,
});

var swiper = new Swiper(".review-slider", {
    slidesPerView: 1.5,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay:3000,
      disableOnInteraction: false,
    },
    loop:true,
});

