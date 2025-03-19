
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    breakpoints: {
        1200: {

            slidesPerView: 3
        },
        762: {

            slidesPerView: 2
        },
        300: {

            slidesPerView: 1
        },

    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

  });
