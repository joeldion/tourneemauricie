'use strict';

/*
 * Mobile menu
 */
const hamburger = document.getElementById('top-menu-hamburger');
const toggleMobileMenu = () => {
    hamburger.classList.toggle('collapsed');
    document.querySelectorAll('#top-menu, #top-menu-list').forEach(el => {
        el.classList.toggle('collapsed');
    });
};
hamburger.addEventListener('click', function(e) {
    e.preventDefault();
    toggleMobileMenu();
});

/* 
 * Scroll to element
 */
const scrollToElement = (element, offset = 100) => {

    // Get the distance from the top of the page to the element
    const elementPosition = element.getBoundingClientRect().top;

    // Get the current scroll position of the page
    const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    // Calculate the final scroll position, including the offset
    const finalPosition = elementPosition + scrollPosition - offset;

    window.scrollTo({
        top: finalPosition,
        behavior: 'smooth'
    });

};

/* 
 * Scroll to anchor element
 */
document.querySelectorAll('.anchor').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        scrollToElement(document.querySelector(e.target.dataset.anchor));
        // Close mobile menu
        if (e.target.closest('.top-menu__item')) {
            toggleMobileMenu();
        }
    });
});

// ReCaptcha
// let reCaptchaToken = document.getElementById('recaptcha-token');
// if (reCaptchaToken) {
//     grecaptcha.ready(function() {
//         grecaptcha.execute( globals.reCaptchaKey, { action: 'homepage' } ).then( function(token) {
//             token_input.value = token;
//         });
//     });
// }