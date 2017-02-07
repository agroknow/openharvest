<?php  global $base_url;?>

<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
  	<div class="row row-padding">
    	<div class="col-md-6">
           	<div class="heading text-left">
             	<div class="title-style-2 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
              		<?php print $footer; ?>
              	</div>
            </div>
       	</div>
        <div class="col-md-6 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s">
           	<div id="filters-container" class="cbp-l-filters-alignRight filters-2 marTop">
             	<div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All </div>
              	<?php print $header; ?>
           	</div>
       	</div>
        <div class="col-md-12">
        	<div id="portfolio-grid-container" class="cbp-l-grid-projects" data-caption="overlayBottomReveal" data-animation="slideLeft" data-gaphorizontal="38" data-gapvertical="50" data-logo="<?php print $base_url.'/'.path_to_theme();?>/images/logo/logo-black.png">
        		<?php print $rows; ?>
            </div>
        </div>	
    </div>
</div>

<?php endif; ?>