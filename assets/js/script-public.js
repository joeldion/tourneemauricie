'use strict';

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
 * Scroll to section when clicking menu link
 */
const menuLinks = document.querySelectorAll('.menu__item > a');
menuLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        scrollToElement(document.querySelector(e.target.dataset.target));
    });
});