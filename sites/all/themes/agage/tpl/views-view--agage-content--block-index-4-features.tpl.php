<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
    	<div class="col-md-5 col-md-offset-7 col-sm-12">
        	<div class="heading wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s"><?php print $header; ?></div>
        	<div class="features marTop clearfix"><?php print $rows; ?></div>
        </div>
    </div>
</div>
<div class="col-md-6 hidden-sm leftAl img-holder-2 wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s" data-background="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/9.jpg"> </div>
<?php endif; ?>
