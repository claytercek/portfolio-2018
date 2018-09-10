jQuery(document).ready(function($) {
	$(window).on("load", function() {
		$("#MASK, #lidShadow").attr("transform", "matrix(1, 0, 0," + 0 + ", 0, " + (117 - 0 * 117) + ")");
		blink();

		var currentMousePos = { x: -1, y: -1 };
		var eyePosition = $("#eye").offset();

		var eyewidth = $("#eye").width();

		//get center of eyes instead of top left position:
		eyePosition.left = eyePosition.left + eyewidth / 2;
		eyePosition.top = eyePosition.top + eyewidth / 2;

		$(document).mousemove(function(event) {
			currentMousePos.x = event.pageX;
			currentMousePos.y = event.pageY;

			var x = currentMousePos.x - eyePosition.left;
			var y = currentMousePos.y - eyePosition.top;

			var divNum = 10;

			$("g#center").css("transform", "translate(" + x / divNum + "px ," + y / divNum + "px)");
			// $("#eyeCenter").css("top", 50 - l_eyeDisplacement + "%");
		});

		function blink() {
			// $("#MASK").attr("transform", "matrix(1, 0, 0, .5, 0, 58.8)");
			$("#MASK, #lidShadow").animate(
				{ sy: 0 },
				{
					duration: 100,
					step: function(now) {
						$(this).attr("transform", "matrix(1, 0, 0," + now + ", 0, " + (117 - now * 117) + ")");
					}
				}
			);
			$("#MASK, #lidShadow")
				.delay(100)
				.animate(
					{ sy: 1 },
					{
						duration: 100,
						step: function(now) {
							$(this).attr("transform", "matrix(1, 0, 0," + now + ", 0, " + (117 - now * 117) + ")");
						}
					}
				);
		}

		(function loop() {
			var rand = Math.round(Math.random() * (6000 - 500)) + 500;
			setTimeout(function() {
				blink();
				loop();
			}, rand);
		})();
	});
});
