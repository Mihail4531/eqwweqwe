var swiper = new Swiper(".slizer", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    1200: {

        slidesPerView: 3
    },
    762: {

        slidesPerView: 2
    },
    300: {

        slidesPerView: 1
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
