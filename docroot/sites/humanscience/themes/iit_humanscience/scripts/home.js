(function($){

	$(document).ready(function(){
		var globalHeaderHeight = $('.region-iit-global-header').height();
		var collegeHeaderHeight = $('#header-wrapper').height();
		var windowHeight = $(window).height();

		function resizeViewport() {
			globalHeaderHeight = $('.region-iit-global-header').height();
			collegeHeaderHeight = $('#header-wrapper').height();
			windowHeight = $(window).height();

			$('#hero-wrapper').height(windowHeight - globalHeaderHeight - collegeHeaderHeight);
		}

		var $theWindow = $(window);
		var $bgImgs = $('img', '#hero-wrapper');
		//var aspectRatio = $bg.width() / $bg.height();
		var aspectRatio = 1.77777777777778;
		var $theViewport = $('#hero-wrapper');


		$bgImgs.eq(Math.floor((Math.random() * $bgImgs.length))).addClass('active-slide');


		function resizeBg() {
			if (($theViewport.width() / $theViewport.height()) < aspectRatio) {
				$bgImgs.each(function(){
					$(this).removeClass('bgwidth').addClass('bgheight');
				});
			} else {
				$bgImgs.each(function(){
					$(this).removeClass('bgheight').addClass('bgwidth');
				});
			}
		}

		function centerImg() {
			$bgImgs.each(function(){
				if ($(this).hasClass('bgwidth')) {
					var bgHeightDiff = $(this).height() - $theViewport.height();
					if (bgHeightDiff > 0) {
						$(this).css('top', ((bgHeightDiff / -2) + 'px'));
						$(this).css('left', '0px');
					}
				} else {
					var bgWidthDiff = $(this).width() - $theViewport.width();
					if (bgWidthDiff > 0) {
						$(this).css('left', ((bgWidthDiff / -2) + 'px'));
						$(this).css('top', '0px');
					}
				}
			});

		}

		$theWindow.resize(function(){
			resizeViewport();
			resizeBg();
			centerImg();
		}).resize();

	});

})(jQuery);