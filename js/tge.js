// Filter navigation
(function($) {
	$("#tge-filter a").click(function () {
		$("#filter").slideToggle("slow");
	});
})(jQuery);

// TypeKit
try{Typekit.load();}catch(e){}