jQuery(document).ready(function($) {
	function addBlacklistClass() {
		$("a").each(function() {
			if (this.href.indexOf("/wp-admin/") !== -1 || this.href.indexOf("/wp-login.php") !== -1) {
				$(this).addClass("wp-link");
			}
		});
	}

	$(function() {
		addBlacklistClass();

		var settings = {
			anchors: "a[target!='_blank']",
			blacklist: ".wp-link",
			onAfter: function() {
				addBlacklistClass();
			}
		};

		$("#main").smoothState(settings);
	});
});
