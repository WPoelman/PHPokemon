
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