function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
$(function(){
    $('body').on('click','*[data-share]',function(e){
        e.preventDefault();
        var url, attributes;
        switch($(this).data('share')){
            case 'facebook':
                var D = 550, A = 450, C = screen.height, B = screen.width, H = Math.round((B / 2) - (D / 2)), G = 0, F = document, E;
                if(C > A) {
                    G = Math.round((C / 2) - (A / 2));
                }
                url = 'http://www.facebook.com/sharer.php?u='+$(this).data('url');
                attributes = 'left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,toolbar=0,scrollbars=1,resizable=no';
                window.open(url,$(this).attr('data-share'),attributes);
            break;
            case 'twitter':
                window.twttr = window.twttr || { };
                var D = 550, A = 450, C = screen.height, B = screen.width, H = Math.round((B / 2) - (D / 2)), G = 0, F = document, E;
                if(C > A) {
                    G = Math.round((C / 2) - (A / 2));
                }
                url = 'https://twitter.com/intent/tweet?via='+$(this).data('via')+'&text='+encodeURIComponent($(this).data('text')).replace(/\+/g,"%2B")+'&url='+encodeURIComponent($(this).data('url')).replace(/\+/g,"%2B");
                if($(this).data('lang')) url += "&lang="+$(this).data('lang');
                attributes = 'left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,toolbar=0,scrollbars=1,resizable=1';
                window.twttr.shareWin = window.open(url,$(this).data('share'),attributes);
            break;
            case 'google':
                var D = 600, A = 600, C = screen.height, B = screen.width, H = Math.round((B / 2) - (D / 2)), G = 0, F = document, E;
                if(C > A) {
                    G = Math.round((C / 2) - (A / 2));
                }
                url = 'https://plus.google.com/share?url='+$(this).data('url');
                if($(this).data('lang')) url += "&hl="+$(this).data('lang');
                attributes = 'left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,menubar=no,toolbar=no,resizable=no,scrollbars=no';
                window.open(url,$(this).data('share'),attributes);
            break;
            case 'linkedin':
                var D = 600, A = 383, C = screen.height, B = screen.width, H = Math.round((B / 2) - (D / 2)), G = 0, F = document, E;
                if(C > A) {
                    G = Math.round((C / 2) - (A / 2));
                }
                url = 'http://www.linkedin.com/cws/share?url='+encodeURIComponent($(this).data('url'));
                attributes = 'left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,toolbar=0,scrollbars=1,resizable=1';
                window.open(url,$(this).data('share'),attributes);
            break;
            case 'pinterest':
                var D = 765, A = 543, C = screen.height, B = screen.width, H = Math.round((B / 2) - (D / 2)), G = 0, F = document, E;
                if(C > A) {
                    G = Math.round((C / 2) - (A / 2));
                }
                url = 'https://www.pinterest.com/pin/create/button/?url='+encodeURIComponent($(this).data('url'))+'&media='+encodeURIComponent($(this).data('media'))+'&description='+encodeURIComponent($(this).data('description'));
                attributes = 'left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,toolbar=0,scrollbars=1,resizable=no';
                window.open(url,$(this).attr('data-share'),attributes);
            break;
            case 'url':
                var D = 600, A = 463, C = screen.height, B = screen.width, H = Math.round((B / 2) - (D / 2)), G = 0, F = document, E;
                if(C > A) {
                    G = Math.round((C / 2) - (A / 2));
                }
                url = $(this).data('url');
                attributes = 'left='+H+',top='+G+',width='+D+',height='+A+',personalbar=0,toolbar=0,scrollbars=1,resizable=1';
                window.open(url,$(this).data('share'),attributes);
            break;
            case 'mailto':
                var mail = prompt("Enviar este articulo a un amigo","user@domain");
                if (mail !== null && IsEmail(mail)){
                    var data = {};
                    var url = $(this).data('urlmail');
                    data.email = mail;
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        statusCode: {
                            200: function(data){
                                alert(data.message);
                            }
                        }
                    });
                }
                else{
                    alert('Correo electrónico inválido');
                }
            break;
        }
    });
});
