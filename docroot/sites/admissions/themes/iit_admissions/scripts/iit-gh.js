jQuery(document).ready(function($){
	var slideSpeed = 600;

    // Exit Slide Up
    $('#iit-gh-menu-exit').click(function(){
        if (!$('#iit-gh-menu-wrapper').hasClass('iit-gh-menu-wrapper-closed')) {
            $('#iit-gh-menu-container').slideUp(slideSpeed, function(){
            	$('#iit-gh-menu-wrapper').removeClass('iit-gh-menu-wrapper-open');
        		$('#iit-gh-menu-wrapper').addClass('iit-gh-menu-wrapper-closed');
        		$('#iit-gh-menu-container > nav').removeClass('iit-gh-menu-active');
                $('#iit-gh-primary-nav a').removeClass('iit-gh-nav-active');
            });
            $('#iit-gh-menu-exit').slideUp(slideSpeed);
        }
    }); // end exit slide up

    // Primary Nav Click Handler
    $('#iit-gh-primary-nav a').click(function(){
    	if (!$(this).hasClass('iit-gh-primary-nav-nochild')) {
    		// Get id of clicked link and relative menu
    		var thisId = $(this).attr('id');
    		var menuId = 'iit-gh-menu-' + thisId.substring(11);

    		// Close if tab clicked again
    		if ($('#' + menuId).hasClass('iit-gh-menu-active')) {
    			$('#iit-gh-menu-container').slideUp(slideSpeed, function(){
            		$('#iit-gh-menu-wrapper').removeClass('iit-gh-menu-wrapper-open');
        			$('#iit-gh-menu-wrapper').addClass('iit-gh-menu-wrapper-closed');
        			$('#' + menuId).removeClass('iit-gh-menu-active');
                    $('#' + thisId).removeClass('iit-gh-nav-active');
            	});
            	$('#iit-gh-menu-exit').slideUp(slideSpeed);
            	return false;
    		}

    		// Show correct menu
    		$('#iit-gh-menu-container > nav').removeClass('iit-gh-menu-active');
    		$('#' + menuId).addClass('iit-gh-menu-active');
            $('#iit-gh-primary-nav a').removeClass('iit-gh-nav-active');
            $('#' + thisId).addClass('iit-gh-nav-active');

    		// If closed open
    		if ($('#iit-gh-menu-wrapper').hasClass('iit-gh-menu-wrapper-closed')) {
    			$('#iit-gh-menu-container').slideDown(slideSpeed, function(){
    				$('#iit-gh-menu-wrapper').removeClass('iit-gh-menu-wrapper-closed');
    				$('#iit-gh-menu-wrapper').addClass('iit-gh-menu-wrapper-open');
    			});
    			$('#iit-gh-menu-exit').slideDown(slideSpeed);
    		}
    		
    		return false;
    	}
    }); // end primary nav click handler

    //Mobile specific js
    if (window.outerWidth < 600) {
        //alert('mobile');
        $('.iit-gh-menu-category h5').click(function(){
            //alert('test');
            if ($(this).hasClass('open-category-headline')) {
                $(this).next().slideUp(slideSpeed);
                $(this).removeClass('open-category-headline');
            } else {
            $(this).next().slideDown(slideSpeed);
            $(this).addClass('open-category-headline');
            }
        });

        $('#iit-gh-header').append('<div id="iit-gh-nav-expander">&#57349;</div>');

        $('#iit-gh-nav-expander').click(function(){
            if ($('#iit-gh-primary-nav').hasClass('primary-nav-open')) {
                $('#iit-gh-primary-nav').removeClass('primary-nav-open');
                $('#iit-gh-primary-nav').slideUp(slideSpeed);
            } else {
                $('#iit-gh-primary-nav').slideDown(slideSpeed);
                $('#iit-gh-primary-nav').addClass('primary-nav-open');
            }
        });
    }

}); // end document.ready