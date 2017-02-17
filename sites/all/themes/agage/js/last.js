(function($) {
	$(document).ready(function() {
		$('html').on('click', '.toggleme', function() {
			$(this).next('.togg').toggle();
		});
	});
})(jQuery);