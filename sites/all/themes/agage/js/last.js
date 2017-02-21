(function($) {
	$(document).ready(function() {
		$('html').on('click', '.toggleme', function() {
			$(this).next('.togg').toggle();
		});
		$('body').css('padding-top', $('.navbar-fixed-top').height() + 10);
	});
})(jQuery);