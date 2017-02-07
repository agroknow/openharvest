<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/2.jpg"></div>
<div class="parallax-overlay bg-strip"></div>
<div class="container">
	<div class="row row-padding">
		<?php print $rows; ?>
	</div>
</div>

<?php endif; ?>