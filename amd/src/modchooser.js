define(['jquery'], function($){
    /**
    * Snap modchooser listener to add current section to urls.
     */
    var modchooserjump = function() {
        //console.log("modchooser jump");
        $("[name='submitbutton']").trigger('click');
    };

    var setmodjump = function() {
        //console.log("clicked");
        setTimeout(function(){
            //console.log("timed out");
            $('li.modchooser_resources a').tab('show');
            $("[type='radio']").change(modchooserjump);
        }, 500);
    };

    var init = function() {
        //console.log("mod chooser init");
        //create an event listener on the hidden input named "jump"
        $('.section-modchooser-link').click(setmodjump);
    };

    return {
        init: init
    };
});