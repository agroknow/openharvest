<?php  global $base_url; ?>

<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
  	<div class="row row-padding">
      	<div class="text-center clearfix wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s">
            <h4 class="text-uppercase"><?php print t('What peaople say!');?></h4>
            <div class="col-md-6 col-md-offset-3 clearfix">
                <span class="quot">
                	<img src="<?php print $base_url.'/'.path_to_theme();?>/images/others/quote.png" alt="quot">
                </span>
                <div id="testimonialsWrap" class="owl-carousel clearfix">
                    <?php print $rows; ?>
                </div>
                <div id="testimonialsClients" class="owl-carousel">
                    <?php print $header; ?>
                </div>
          	</div>
      	</div>
  	</div>
</div>

<?php endif; ?>