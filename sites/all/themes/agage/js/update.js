jQuery(function(){
	
	jQuery('.id-home').attr('id','home');
	jQuery('.id-about-us').attr('id','about-us');
	jQuery('.id-services').attr('id','services');
	jQuery('.id-portfolio').attr('id','portfolio');
	jQuery('.id-parallax-section-1').attr('id','parallax-section-1');
	jQuery('.id-testimonials').attr('id','testimonials');
	jQuery('.id-pricing').attr('id','pricing');
	jQuery('.id-twitter').attr('id','twitter');
	jQuery('.id-blog').attr('id','blog');
	jQuery('.id-contact').attr('id','contact');
	jQuery('.id-subscribe').attr('id','subscribe');
	jQuery('.id-team').attr('id','team');
	jQuery('.id-clients').attr('id','clients');
	jQuery('.id-blog-main').attr('id','blog-main');
	
	jQuery('.set-bg').each(function(){
		$val = jQuery('.get-bg',this).attr('data-bg');
		jQuery(this).attr('data-background',$val);
	});
	
	jQuery('html.content-section').removeClass('content-section');
	
	jQuery('form.contact-form .form-item-name input[type=text]').attr('placeholder','Name');
	jQuery('form.contact-form .form-item-mail input[type=text]').attr('placeholder','Email');
	jQuery('form.contact-form .form-item-subject input[type=text]').attr('placeholder','Subject');
	jQuery('form.contact-form .form-item-message textarea').attr('placeholder','Message');
	jQuery('form.contact-form .form-item-copy').remove();
	
	jQuery('form.simplenews-subscribe .form-item label').remove();
	jQuery('form.simplenews-subscribe .form-item input[type=text]').attr('placeholder','Enter your mail');
	
	jQuery('.features6 .col-sm-4:nth-child(1) figure').addClass('green');
	jQuery('.features6 .col-sm-4:nth-child(2) figure').addClass('red');
	jQuery('.features6 .col-sm-4:nth-child(3) figure').addClass('blue');
	
	$video_url = jQuery('.blog-media').text();
	jQuery('.blog-media').append('<iframe class="embed-responsive-item" src="'+ $video_url +'" width="320" height="212" allowfullscreen></iframe>');
	
	
	jQuery('.post-result-title span.result').html( jQuery('.count-total').first().text() + ' posts found');
	
	jQuery('#edit-preview').remove();
	
	jQuery('.coming-soon .contact-form .form-type-textfield').wrapAll('<div class="col-md-6"></div>');
	jQuery('.coming-soon .contact-form .form-item-message,.coming-soon .contact-form .form-item-copy,.coming-soon .contact-form .form-actions').wrapAll('<div class="col-md-6"></div>');
	
	
	
	//Main Menu
	//==========
	jQuery('section#home').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li class="active home"><a href="#home">Home</a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#home"><span class="icon ion-home"></span>Home</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#home" class="active"><i class="icon ion-home"></i><span class="text-uppercase">Home</span></a></li>');
	});
	jQuery('section#about-us').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#about-us">About</a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#about-us"><span class="icon ion-ios-person"></span> About</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#about-us"><i class="icon ion-ios-person"></i><span class="text-uppercase">About</span></a></li>');
	});
	jQuery('section#team').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#team">Team</a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#team"><span class="icon ion-ios-people"></span> Team</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#team"><i class="icon ion-ios-people"></i><span class="text-uppercase">team</span></a></li>');
	});
	jQuery('section#services').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#services">Services </a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#services"><span class="icon ion-paper-airplane"></span> Services</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#services"><i class="icon ion-paper-airplane"></i><span class="text-uppercase">Services</span></a></li>');
	});
	jQuery('section#portfolio').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#portfolio">Work </a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#portfolio"><span class="icon ion-grid"></span> Work</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#portfolio"><i class="icon ion-grid"></i><span class="text-uppercase">Work</span></a></li>');
	});
	jQuery('section#pricing').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#pricing">Pricing </a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#pricing"><span class="icon ion-paper-airplane"></span>Pricing</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#pricing"><i class="icon ion-paper-airplane"></i><span class="text-uppercase">Pricing</span></a></li>');
	});
	jQuery('section#blog').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#blog">Blog </a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#blog"><span class="icon ion-compose"></span> Blog</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#blog"><i class="icon ion-compose"></i><span class="text-uppercase">blog</span></a></li>');
	});
	jQuery('section#contact').each(function(){
		jQuery('ul.nav.navbar-nav').append('<li><a href="#contact">Contact </a></li>');
		jQuery('ul.nav#main-menu').append('<li><a href="#contact"><span class="icon ion-android-contact"></span> Contact</a></li>');
		jQuery('ul.collapse.navbar-collapse').append('<li><a href="#contact"><i class="icon ion-android-contact"></i><span class="text-uppercase">Contact</span></a></li>');
	});
	
});


