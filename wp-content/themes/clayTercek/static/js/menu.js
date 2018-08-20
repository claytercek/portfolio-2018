jQuery(document).ready(function($) {
	$(window).on("scroll", function() {
		if (window.pageYOffset > 50) {
			hideNav();
		} else {
			showNav();
		}
	});

	const NavItems = $("header > ul > .menu-item");
	console.log(NavItems);
	const SearchLink = $("header #search").first();
	const menuIcon = $("header .menuIcon").first();
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

	const overlay = $("header #overlay").first();
	const closeIcon = $("header  .closeIcon").first();
	const overlayItems = overlay.find("a  *");
	const activeItem = overlay.find(".current_page_item");
	menuIcon.click(function() {
		openMenu();
	});
	closeIcon.click(function() {
		closeMenu();
	});
	overlay.click(function() {
		closeMenu();
	});

	function openMenu() {
		overlay.css("display", "flex");
		menuIcon.hide();
		closeIcon.show();

		var activeIndex = activeItem.index() - 1;
		activeItem.css("transition-delay", activeIndex * 0.1 + "s");

		overlayItems.each(function(i) {
			$(this).css("transition-delay", i * 0.1 + "s");
		});
		window.setTimeout(function() {
			overlayItems.toggleClass("showOverlayLinks");
			activeItem.toggleClass("changed");
		}, 50);
	}

	function closeMenu() {
		overlayItems.toggleClass("showOverlayLinks");
		activeItem.toggleClass("changed");
		overlay.hide(0);
		menuIcon.show();
		closeIcon.hide();
	}
});
