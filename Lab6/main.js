$(function() {
    let width = 1920;
    let currentSlide = 1;

    let slideContainer = $('.slides');
    let slides = $('.slide');

    slideContainer.css('margin-left', -7680);

    function slide() {
        slideContainer.animate(
        {
            'margin-left': '+=' + width
        }, 
        1500,
        function() {
            console.log(currentSlide);
            if ( ++currentSlide == slides.length ) {
                currentSlide = 1;
                slideContainer.css('margin-left', -7680);
            }
            
        });
    }

    slideContainer.on('click', slide);
});