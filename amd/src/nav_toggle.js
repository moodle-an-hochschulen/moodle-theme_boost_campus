define(['jquery'], function($) {
    var messageButton = $('#message-drawer-toggle-nav');
    var drawerButton = $('div[data-region="drawer-toggle"] > button.nav-link');
    var eventSet = false;

    var init = function() {       
        var isMobile = window.matchMedia("only screen and (max-width: 767.98px)").matches;
        if (isMobile) {
            //set listeners
            setToggles();
        }
        $(window).on("resize", sizeListen);
    };

    var sizeListen = function(){
        var isMobile = window.matchMedia("only screen and (max-width: 767.98px)").matches;
        if (isMobile && !eventSet) {
            //set listeners
            setToggles();
        }
        else if(!isMobile && eventSet) {
            // check if listeners set  
            //if so, remove them
            if(messageButton && drawerButton){
                removeToggles();
            }
        }
    }

    var setToggles = function(){
        messageButton.click(closeDrawer);
        drawerButton.click(closeDrawer);

        eventSet = true;
    }

    var removeToggles = function(){
        console.log("remove toggles");
        messageButton.off("click");
        drawerButton.off("click");

        eventSet = false;
    }

    var closeDrawer = function(e){
        if($(this).attr('id') == 'message-drawer-toggle-nav'){
            //check if navbar is open by aria-expanded
            if(drawerButton.attr('aria-expanded') == 'true') {
                drawerButton.click();
            }
        }
        else {
            if(messageButton.hasClass('drawer-active')) {
                messageButton.click();
            }
        }
    }

    return {
        init: init
    };

});