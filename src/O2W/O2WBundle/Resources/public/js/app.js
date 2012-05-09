$(document).ready(function() {
	Fancybox.init();
//    Social.init();
    FormsValidation.init();
    slider = new Slider("#slider");
});



var Fancybox = {
	init : function()
	{
		Fancybox._loadCss();
		if ($("a.fancybox").length > 0)
			$("a.fancybox").fancybox();

		if ($("a.google-maps").length > 0)
			$("a.google-maps").fancybox( { width: 645, height: 475, hideOnContentClick: false, 'type'	: 'iframe'});

	},

	_loadCss : function()
	{
		$("head").append("<link>");
		css = $("head").children(":last");
		css.attr({
			rel:  "stylesheet",
			type: "text/css",
			href: "/resources/js/jquery/fancybox/jquery.fancybox-1.3.1.css"
		});
	}
};



var Social=  {
    init : function() {
        $("a.facebook").click(function() {
            window.open($(this).attr("href"));
            return false;
        });
    }

};


var FormsValidation = {
    init :function() {
        if ($("#contact-form").length > 0) {
            $("#contact-form").validate();
        }
    }
};



var Slider = (function() {
    function Slider(id) {
        this.id = id;
        this.run();
    }

    Slider.prototype.run = function() {
        if ($(this.id).length > 0) {
            return $(this.id).nivoSlider({
                effect: "random",
                controlNav: true,
                directionNav: true,
                pauseTime: 3000,
                captionOpacity: 0.5
            });
        }
        return true;
    };
    return Slider;
})();
