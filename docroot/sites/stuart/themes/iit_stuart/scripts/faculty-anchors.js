jQuery(document).ready(function($) {
	$('.view-faculty h3').each(function(){
		if ($(this).text().toLowerCase() === "faculty") {
			$(this).attr('id', 'faculty');
		}
		if ($(this).text().toLowerCase() === "industry experts") {
			$(this).attr('id', 'industry');
		}
	});
});