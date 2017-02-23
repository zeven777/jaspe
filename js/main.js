var i = 0;
var timeout;
$(document).ready(function(){
    var doAnimate = function(){
        $('.banner .slider img.active').addClass('out');
        if($('.banner .slider img.active').index()===($('.slider').children().size() - 1))
            $('.banner .slider img:nth(0)').addClass('next').addClass('in');
        else
            $('.banner .slider img.active + img').addClass('next').addClass('in');
    };

    $('.btn-menu').click(function(e){
        $('.page').toggleClass('expand');
        e.preventDefault();
    });
    $('body').bind("webkitTransitionEnd oTransitionEnd otransitionend transitionend msTransitionEnd", function(){
        $('.banner .slider img.active.out').removeClass('active').removeClass('out');
        $('.banner .slider img.next.in').addClass('active').removeClass('next').removeClass('in');
        clearTimeout(timeout);
        timeout = setTimeout(doAnimate,5000);
    });
    clearTimeout(timeout);
    timeout = setTimeout(doAnimate,5000);



});
