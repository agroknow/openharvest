(function($) {
	$(document).ready(function() {
		$('html').on('click', '.toggleme', function() {
			$(this).next('.togg').toggle();
		});
		var height = $('.navbar-fixed-top').height();
		$('body').css('padding-top', $('body').hasClass('admin-menu') ?  height + 10 : height + 10);
	});
})(jQuery);