/*################## display customer name ###############*/

function displayCustomer(){
    var customer = document.getElementsByClassName("customer_name")[0];
    if (customer.innerText.trim() === '') {
        // Span has no value
        customer.style.display = "none";
    }
};
window.addEventListener("load", displayCustomer())


/*############### animation ##########*/
var swiper = new Swiper(".animation_container", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


/*################# fashion product ################*/

var swiper_fashion = new Swiper(".fashion_container", {
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        500: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        728: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        828: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1200: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});
/*################## accessories product ################*/

var swiper_fashion = new Swiper(".accessories_container", {
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1200: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});

/*######################## home garden ##################*/

var swiper_home = new Swiper(".home-garden_container", {
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1200: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});