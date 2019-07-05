define(['jquery'], function($) {

    var init = function() {
        //once document is loaded, checks if mobile device or smaller screen and changes bg image if not
        $(document).ready(function(){
            var isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;

            if (!isMobile) {
                var img =  $('#page-login-index').attr('style');
                var imgname = 'loginlow';
                var imghighres = img.replace(imgname, 'login');
                $('#page-login-index').attr('style', imghighres);
            }
        })
    };

    return {
        init: init
    };

});