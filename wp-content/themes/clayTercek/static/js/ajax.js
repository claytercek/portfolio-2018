jQuery(document).ready(function($) {
	function addBlacklistClass() {
		$("a").each(function() {
			if (this.href.indexOf("/wp-admin/") !== -1 || this.href.indexOf("/wp-login.php") !== -1) {
				$(this).addClass("wp-link");
			}
		});
	}

	var anim = bodymovin.loadAnimation({
		container: document.getElementById("animationContainer"), // Required
		path: templateUrl + "/static/js/animations/transition_out.json", // Required
		renderer: "svg", // Required
		loop: false, // Optional
		autoplay: false, // Optional
		prerender: true,
		name: "transition out", // Name for future reference. Optional.
		rendererSettings: {
			preserveAspectRatio: "none"
		}
	});

	$(function() {
		addBlacklistClass();

		var settings = {
			anchors: "a[target!='_blank']",
			blacklist: ".wp-link",
			onStart: {
				duration: 750, // Duration of our animation
				render: function($container) {
					closeMenu();
					// Restart your animation
					anim.setSpeed(1.5);
					anim.playSegments([1, 30], true);
					// smoothState.restartCSSAnimations();
				}
			},
			onReady: {
				duration: 750,
				render: function($container, $newContent) {
					// Inject the new content
					$container.html($newContent);
					anim.playSegments([31, 60], true);
				}
			},
			onAfter: function() {
				addBlacklistClass();
			}
		};

		smoothState = $("#main")
			.smoothState(settings)
			.data("smoothState");
	});
});
