// JS file for making the Pokémon list page a bit more interactive:

// This code makes shows which Pokémon is selected by giving it an extra border
// and making the selected Pokémon bounce with a css animation, by adding the 'bouncing' class.
$(function() {
    $('.current').css( "border", "2px solid crimson" );
    $('.pokemon').on('click', function(){
        $('.current').css( "border", "none" );
        $('.current').removeClass('current');
        $(this).toggleClass('current');
        $( this ).css( "border", "2px solid crimson" );
        $('.sprite').removeClass('bouncing');
        $(".current .sprite").toggleClass('bouncing');
    });

});