'use strict';

/*
 * Scroll to section when clicking menu link
 */
const menuLinks = document.querySelectorAll('.menu__item > a');
menuLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(e.target.dataset.target);
        setTimeout(function(){
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 100);
    });
});