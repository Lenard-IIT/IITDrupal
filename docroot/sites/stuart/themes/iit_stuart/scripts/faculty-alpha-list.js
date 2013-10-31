jQuery(document).ready(function($) {
	$('.view-faculty h3').each(function(){
		$(this).attr("id", $(this).text());
	});
	var $letter_selector_container = $("<div>", {id: "letter-selector-wrapper"});
	var $letter_selector = $('<ul>', {id: "letter-selector"});
	$('.view-faculty h3').each(function(){
		var id = $(this).attr("id");
		var $aLink = $('<a>', {title: id, href: ('#' + id)}).html(id);
		$letter_selector.append($aLink);
	});
	$letter_selector_container.append($letter_selector);
	$('div.view-id-faculty').prepend($letter_selector_container);
});