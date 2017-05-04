var i = 0;
var timeout, scrollHeight;
$(document).ready(function(){

    var getScrollHeight = function(){
        var sh = $('body').height() - $(window).height();
        return sh;
    };

    var doAnimate = function(){
        var nb = $('.banner-reel .banner-item').size();
        if (nb <= 1) return;
        var st = $(window).scrollTop();
        var range = Math.round(scrollHeight / nb);
        var index = parseInt(st / range);
        var ci = $('.banner-reel .banner-item.active').index();
        if( ci != index ){
            $('.banner-reel .banner-item.active').removeClass('active');
            $('.banner-reel .banner-item:nth('+index+')').addClass('active');
        }
    };

    scrollHeight = getScrollHeight();

    clearTimeout(timeout);
    timeout = setTimeout(doAnimate,5000);

    $('.banner.detalle').css('max-height',$(window).height());

    $(window).resize(function(){

        clearTimeout(timeout);

        timeout = setTimeout(function(){
            $('.banner.detalle').css('max-height',$(window).height());
            scrollHeight = getScrollHeight();
        },500);

    });

    $(window).scroll(function(){

        clearTimeout(timeout);
        timeout = setTimeout(doAnimate,10);

    });

    clearTimeout(timeout);
    timeout = setTimeout(doAnimate,100);

    $('.btn-menu').click(function(e){
        $('.page').toggleClass('expand');
        $('body').toggleClass('menu-expanded');
        e.preventDefault();
        $('.navbar.header').toggleClass('navbar-expand');
        $('.btn-menu').toggleClass('navbar-expand');
        if( $(window).width() <= 1024 ) return;
        var height = $('.banner.detalle + .main.detalle > .container').height();
        height = height - $(window).height();
        $('.banner.detalle > .before').css('height',height);
    });
});
