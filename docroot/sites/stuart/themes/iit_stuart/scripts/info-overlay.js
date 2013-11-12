(function($){

	$(document).ready(function(){
		var $overlay = $('#iit-stuart-header-buttons .overlay');

		$('#request-info-button').click(function(evt){
			evt.preventDefault();
			$overlay.removeClass('closed').addClass('open');
		});

		$overlay.click(function(evt){
			evt.stopPropagation();
			$overlay.removeClass('open').addClass('closed');
		});

		$('#info-popup', $overlay).click(function(evt){
			evt.stopPropagation();
		});

		$('a', $overlay).click(function(evt){
			$overlay.removeClass('open').addClass('closed');
		});

	});

})(jQuery);