// Filter navigation
(function($) {
	$("#nav-second a").click(function () {
    $("#nav-search").hide();
		$("#filter").slideToggle("slow");
	});

  $("#nav-third a").click(function () {
    $("#filter").hide();
    $("#nav-search").slideToggle("slow");
  });

  $("#tge-mobile-menu a").click(function () {
    $(".header .navigation").slideToggle("slow");
  });
})(jQuery);

// TypeKit
try{Typekit.load();}catch(e){}
