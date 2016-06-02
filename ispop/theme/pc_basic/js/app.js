var App = function () {

    function handleIEFixes() {
        //fix html5 placeholder attribute for ie7 & ie8
        if (jQuery.browser.msie && jQuery.browser.version.substr(0, 1) < 9) { // ie7&ie8
            jQuery('input[placeholder], textarea[placeholder]').each(function () {
                var input = jQuery(this);

                jQuery(input).val(input.attr('placeholder'));

                jQuery(input).focus(function () {
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });

                jQuery(input).blur(function () {
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                    }
                });
            });
        }
    }
    
	function setSizes() {
		$('.ebm-sidebar-mb').css({'height': ($(window).height()) + 'px'});
	}
	
	setSizes();
	$(window).resize(function() {
	  setSizes();
	});

    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });
    }

    return {
        init: function () {
            handleIEFixes();
            handleToggle();
        },

        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        initNavfix: function () {
			$(window).load(function(){
				$(".navbar-fixed").sticky({ topSpacing: 0 });
			});
	    },

        initTooltip: function () {
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();
			});
	    }
    };

}();