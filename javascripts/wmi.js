jQuery( document ).ready(function( $ ) {
// layout Masonry for #itemfiles after all images have loaded
    var $container = $('#itemfiles');

    $container.imagesLoaded( function() {
        $container.masonry({itemSelector:'.file-display'});
    });

});




