$(document).ready(function(){

	$('.sidebar-close').click(function(){
		snapper.close();
		return false;
	});

	var snapper = new Snap({
	    element: document.getElementById('content')
	});

	$('.sidebar-btn').click(function(){
		//$(this).toggleClass('remove-sidebar');
		if( snapper.state().state=="left" ){
			snapper.close();
		} else {
			snapper.open('left');
		}
		return false;
	});

	$(".ebm-sidebar-open").click(function(){
		$("aside").addClass("sidebar-mb-open");
		return false;
	});

	$(".ebm-sidebar-close").click(function(){
		$("aside").removeClass("sidebar-mb-open");
		return false;
	});

});

$(window).load(function() {
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");
})

function cancelZoom() {
    var d = document,
        viewport,
        content,
        maxScale = ',maximum-scale=',
        maxScaleRegex = /,*maximum\-scale\=\d*\.*\d*/;

    // this should be a focusable DOM Element
    if(!this.addEventListener || !d.querySelector) {
        return;
    }

    viewport = d.querySelector('meta[name="viewport"]');
    content = viewport.content;

    function changeViewport(event) {
        // http://nerd.vasilis.nl/prevent-ios-from-zooming-onfocus/
        viewport.content = content + (event.type == 'blur' ? (content.match(maxScaleRegex, '') ? '' : maxScale + 10) : maxScale + 1);
    }

    // We could use DOMFocusIn here, but it's deprecated.
    this.addEventListener('focus', changeViewport, true);
    this.addEventListener('blur', changeViewport, false);
}

// jQuery-plugin
(function($) {
    $.fn.cancelZoom = function() {
        return this.each(cancelZoom);
    };

    // Usage:
    $('input:text,select,textarea').cancelZoom();
})(jQuery);