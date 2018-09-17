jQuery(document).ready(function($) {
	$(window).on("scroll", function() {
		if (window.pageYOffset > 50) {
			hideNav();
		} else {
			showNav();
		}
	});

	const NavItems = $("header > ul > .menu-item");
	const SearchLink = $("header #search").first();
	const menuIcon = $("header .menuIcon");
	const hideNav = () => {
		var count;
		NavItems.each(function(index) {
			$(this).css("transition-delay", index * 0.1 + "s");
			$(this).addClass("hideNav");
			count = index;
		});
		SearchLink.css("transition-delay", (count + 1) * 0.1 + "s");
		menuIcon.css("transition-delay", (count + 1) * 0.1 + "s");
		SearchLink.addClass("hideSearch");
		menuIcon.addClass("showMenuIcon");
	};

	const showNav = () => {
		SearchLink.removeClass("hideSearch");
		menuIcon.removeClass("showMenuIcon");
		NavItems.each(function(index) {
			$(this).removeClass("hideNav");
		});
	};

	$("body").on({
		mousewheel: function(e) {
			if (e.target.id != "overlay") return;
			e.preventDefault();
			e.stopPropagation();
		}
	});
	var overlay;
	var closeIcon;
	var overlayItems;
	var activeItem;
	window.openMenu = function() {
		overlay = $("header #overlay");
		closeIcon = $("header  .closeIcon");
		overlayItems = overlay.find("a  *");
		activeItem = overlay.find(".current-menu-item");
		overlay.css("display", "flex");
		menuIcon.hide();
		closeIcon.show();

		var activeIndex = activeItem.index();
		overlayItems.each(function(i) {
			$(this).css("transition-delay", i * 0.1 + "s");
		});
		window.setTimeout(function() {
			overlayItems.toggleClass("showOverlayLinks");
		}, 50);
		window.setTimeout(function() {
			activeItem.toggleClass("changed");
		}, 100 * activeIndex + 100);
	};

	window.closeMenu = function() {
		overlayItems.toggleClass("showOverlayLinks");
		activeItem.toggleClass("changed");
		overlay.hide(0);
		menuIcon.show();
		closeIcon.hide();
	};
});
