const swiper1 = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true, // Adding loop option to enable infinite looping of slides
    breakpoints: {
        // When window width is >= 576px
        576: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        // When window width is >= 768px
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        // When window width is >= 992px
        992: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});

const swiper2 = new Swiper(".mySwiper1", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true, // Adding loop option to enable infinite looping of slides
    autoplay: {
        delay: 3000, // Set the time interval (in milliseconds) between slides
    },
    breakpoints: {
        // When window width is >= 576px
        576: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        // When window width is >= 768px
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
});