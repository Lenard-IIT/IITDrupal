(function($){
	$(document).ready(function(){

		// Initial On Ready Setup
		var currentMedia = $('#media-check').css('font-family').replace(/^['"]+|\s+|\\|(;\s?})+|['"]$/g, '');
		var newMedia = '';
		var $theWindow = $(window);
		var $menu = $('#header-wrapper nav.block-menu-block');

		// Setup Menu Button and Menu
		$('#department-header-wrapper').append('<div id="button-menu-button">');
		if (currentMedia === 'smartphone_portrait' || currentMedia === 'smartphone_landscape') {
			$menu.css('display', 'none');
			$menu.addClass('closed');
		}
		
		$('#button-menu-button').click(function(evt){
			if ($menu.hasClass('open')) {
				$menu.slideUp(400);
				$menu.removeClass('open');
				$menu.addClass('closed');
			} else {
				$menu.slideDown(400);
				$menu.removeClass('closed');
				$menu.addClass('open');
			}
    	});

		// On Resize Function Declarations
		function checkMediaForMenu() {
            var newMediaType = (newMedia === 'smartphone_portrait' || newMedia === 'smartphone_landscape') ? 'mobile' : 'notmobile';
            var currentMediaType = (currentMedia === 'smartphone_portrait' || currentMedia === 'smartphone_landscape') ? 'mobile' : 'notmobile';

            if (currentMediaType === 'notmobile' && newMediaType === 'mobile') {
                //Going from not moblie to mobile
                //console.log('to mobile');
                $menu.css('display', 'none');
                $menu.removeClass('open').addClass('closed');

            } else if (currentMediaType === 'mobile' && newMediaType === 'notmobile') {
                //Going from mobile to not moblie
                //console.log('from mobile');
                $menu.css('display', 'block');
                $menu.removeClass('closed').addClass('open');
            }
		}

		function calcDeptBoxHeight(){
			var $boxes = $(".page-home #departments-grid .sat-home-grid-4");
			var maxHeight = 0;
			$boxes.each(function(){
				var thisHeight = $(".icon", this).outerHeight(true) + $("h3", this).outerHeight(true) + $("p", this).outerHeight(true) ;
				if (thisHeight > maxHeight) {
					maxHeight = thisHeight;
				}
			});
			$boxes.height(maxHeight + 15);
		}

		$theWindow.resize(function(){
			newMedia = $('#media-check').css('font-family').replace(/^['"]+|\s+|\\|(;\s?})+|['"]$/g, '');
			
			if (currentMedia !== newMedia) {
				// Run Code that needs to run when media query changes
                checkMediaForMenu();
                
                currentMedia = newMedia;
            }

			calcDeptBoxHeight();
		});

		$(document).load(function(){
			calcDeptBoxHeight();
		});

	});
})(jQuery);