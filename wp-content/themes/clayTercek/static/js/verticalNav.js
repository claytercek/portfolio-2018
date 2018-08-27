jQuery(document).ready(function($) {
	$.fn.reverse = Array.prototype.reverse;
	$(document).on("mousewheel", verticalNav);
	$(document).on("keyup", verticalNav);
	$(".work-subnav .link").on("click", worksSubnavLink);
	$(".nav-arrows img").on("click", function() {
		verticalNav({
			type: "arrow",
			direction: $(this).attr("alt") == "down" ? "down" : "up"
		});
	});
	$(document).swipe({
		swipe: function(event, direction) {
			verticalNav({
				type: "swipe",
				direction: direction
			});
		},
		fallbackToMouseEvents: !1
	});

	// Switches input when subnav link is clicked
	// gets index of link, and switches active work to the work div with the same index
	function worksSubnavLink() {
		var link = $(this);
		var work = $("main")
			.first()
			.find(".work")
			.eq(link.index());
		// Don't switch if already active
		if (work.hasClass("is-active")) {
			return;
		}
		switchWork(work);
	}

	// When called, this function makes sure that the correct subnav link has the
	// is-active css class
	function checkWorksSubnav() {
		var main = $("main");
		var subnavLinks = $(".work-subnav .link");
		var activeWork = main.find(".work.is-active");
		subnavLinks.removeClass("is-active");
		subnavLinks.eq(activeWork.index()).addClass("is-active");
	}

	// Calls the nextWork function
	// Takes event as input
	// Determines whether to move to the next or previous item based on input
	function verticalNav(e) {
		var down = null;
		if (e.type == "mousewheel") {
			down = e.deltaY < 0;
		} else if (e.type == "keyup") {
			if (e.which == 40) down = true;
			else if (e.which == 38) down = false;
		} else if (e.type == "swipe") {
			if (e.direction == "up") down = true;
			else if (e.direction == "down") down = false;
		} else if (e.type == "arrow") {
			if (e.direction == "up") down = false;
			else if (e.direction == "down") down = true;
		}

		if (down == null) return;

		if (down) {
			nextWork(true);
		} else {
			nextWork(false);
		}
	}

	// Determines which div should be the target div for switchWork function
	// Accounts for if active item is first or last in list
	function nextWork(next) {
		// main is the container for the work items
		var main = $("main").first();
		var activeWork = main.find(".work.is-active");

		if (next) {
			var nextWork = activeWork.next(".work");
		} else {
			var nextWork = activeWork.prev(".work");
		}
		// Make sure there is a next or previous item before calling function
		if (nextWork.length == 1) {
			switchWork(nextWork);
		}
	}

	var workSwitchingWait = false;

	// Preload work animations
	var animIn;
	$.getJSON("./animations/workIn.json", function(json) {
		animIn = json;
	});
	var animOut;
	$.getJSON("./animations/workOut.json", function(json) {
		animOut = json;
	});

	// Hides current active work and makes target work visible
	// takes target work as input
	// wont run if already running
	function switchWork(targetWork) {
		// don't continue if there is already a swap in progress
		if (workSwitchingWait) {
			return;
		}
		workSwitchingWait = true;
		var main = $("main").first();
		var activeWork = main.find(".work.is-active");
		var startOut = 0;
		var startIn = 0.8;
		var timeLine = new TimelineLite();
		timeLine.pause();

		//Animate out activeWork:
		activeWork.each(function() {
			var animContainer = activeWork.find(".animContainer");
			var text = activeWork.find(".blue");
			var anim = lottie.loadAnimation({
				container: animContainer.get(0),
				renderer: "svg",
				loop: false,
				autoplay: false,
				animationData: animIn,
				prerender: true,
				rendererSettings: {
					preserveAspectRatio: "none"
				}
			});

			var splitText = new SplitText(text.find("p"), {
				type: "lines",
				linesClass: "line"
			});
			var workElements = text.find("h3, .line, a");
			// make sure to animate text in correct direction
			if (targetWork.index() > activeWork.index()) {
				var direction = -1;
			} else {
				var direction = 1;
				workElements.reverse();
				animContainer.css({
					transform: "rotateZ(180deg)"
				});
			}
			timeLine.call(
				function() {
					anim.play();
				},
				null,
				null,
				startOut
			);
			timeLine.staggerTo(
				workElements,
				0.3,
				{
					alpha: 0,
					y: 30 * direction,
					ease: Power3.easeIn
				},
				0.05,
				startOut
			);
			timeLine.call(
				function() {
					// undo css changes
					workElements.css({
						opacity: "",
						transform: ""
					});
					animContainer.css({
						transform: ""
					});
					splitText.revert();
					anim.destroy();
					// switch "is-active" class and update subnav
					activeWork.removeClass("is-active");
					targetWork.addClass("is-active");
					checkWorksSubnav();
				},
				null,
				null,
				startIn
			);
		});

		// Animate in new work
		targetWork.each(function() {
			var animContainer = targetWork.find(".animContainer");
			var text = targetWork.find(".blue");
			var anim = lottie.loadAnimation({
				container: animContainer.get(0),
				renderer: "svg",
				loop: false,
				autoplay: false,
				animationData: animOut,
				prerender: true,
				rendererSettings: {
					preserveAspectRatio: "none"
				}
			});
			var splitText = new SplitText(text.find("p"), {
				type: "lines",
				linesClass: "line"
			});
			var workElements = text.find("h3, .line, a");
			// make sure to animate text in correct direction
			if (targetWork.index() > activeWork.index()) {
				var direction = 1;
				animContainer.css({
					transform: "rotateZ(180deg)"
				});
			} else {
				var direction = -1;
				workElements.reverse();
			}
			TweenLite.set(workElements, {
				opacity: 0,
				y: direction * 30
			});
			timeLine.staggerTo(
				workElements,
				0.3,
				{
					alpha: 1,
					y: 0,
					ease: Power3.easeIn
				},
				0.05,
				startIn
			);
			timeLine.call(
				function() {
					anim.play();
				},
				null,
				null,
				startIn
			);
			timeLine.call(
				function() {
					workElements.css({
						// undo css changes
						opacity: "",
						transform: ""
					});
					animContainer.css({
						transform: ""
					});
					anim.destroy();
					splitText.revert();
					workSwitchingWait = false;
					activeWork.removeClass("is-active");
					targetWork.addClass("is-active");
				},
				null,
				null,
				startIn + 0.9
			);
		});
		timeLine.play();
	}
});
