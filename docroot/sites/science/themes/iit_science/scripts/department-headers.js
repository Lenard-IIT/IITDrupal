(function($){
	$(document).ready(function(){

        //Make sure department or college header exists
        if ($('#department-header-wrapper').length > 0) {

            var currentMedia = $('#media-check').css('font-family');
            var newMedia = '';

    		$('#department-buttons').prepend('<div id="button-menu-button"><div class="icon"></div><span>Menu</span></div>');

    		$('#button-menu-button').click(function(evt){
    			var $menu = $('#department-buttons ul');
    			if ($menu.hasClass('open')) {
    				$menu.slideUp(400, function(){
    					$('#department-buttons ul').css('display', '');
    				});
    				$menu.removeClass('open');
    				$menu.addClass('closed');
    			} else {
    				$menu.slideDown(400);
    				$menu.removeClass('closed');
    				$menu.addClass('open');
    			}
    		});

            if (!$('#department-header-wrapper').hasClass('science')) {
                if (currentMedia === 'smartphone_portrait' || currentMedia === 'smartphone_landscape') {
                    $('#department-buttons').appendTo($('#department-header-wrapper'));
                }
            }

    		if (!$('#department-header-wrapper').hasClass('science')) {
    			//Department Page
                $(window).resize(function(){
                    newMedia = $('#media-check').css('font-family');

                    if (currentMedia !== newMedia) {
                        //console.log("changing media");
                        var newMediaType = (newMedia === 'smartphone_portrait' || newMedia === 'smartphone_landscape') ? 'mobile' : 'notmobile';
                        var currentMediaType = (currentMedia === 'smartphone_portrait' || currentMedia === 'smartphone_landscape') ? 'mobile' : 'notmobile';

                        if (currentMediaType === 'notmobile' && newMediaType === 'mobile') {
                            //Going from not moblie to mobile
                            //console.log('to mobile');
                            $('#department-buttons').appendTo($('#department-header-wrapper'));

                        } else if (currentMediaType === 'mobile' && newMediaType === 'notmobile') {
                            //Going from mobile to not moblie
                            //console.log('from mobile');
                            $('#department-buttons').appendTo($('#department-header'));
                        }
                        
                        currentMedia = newMedia;
                    }
                
                });

    		}

        } //end department or college header test

	});
})(jQuery);
