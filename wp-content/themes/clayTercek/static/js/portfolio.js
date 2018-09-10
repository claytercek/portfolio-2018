jQuery(document).ready(function($) {
	var previousArticle = null;

	$("main.portfolio article").hover(
		//ON HOVER
		function() {
			$(this).addClass("hover");

			$(this)
				.find(".laptop .imgWrapper img")
				.animate({ top: "0" }, 300, "swing");

			$("article")
				.not(this)
				.addClass("notHover");
		},

		//OFF HOVER
		function() {
			$(this).removeClass("hover");
			let laptop = $(this).find("laptop");
			$(this)
				.find(".laptop .imgWrapper img")
				.animate({ top: "-100%" }, 300, "swing", function() {
					$(this).css({ top: "100%" });
				});

			$("article")
				.not(this)
				.removeClass("notHover");
		}
	);
});
