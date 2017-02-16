<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<title><?php print $head_title; ?></title>
<?php print $styles; ?><?php print $head; ?>
<?php
	//Tracking code
	$tracking_code = theme_get_setting('general_setting_tracking_code', 'agage');
	print $tracking_code;
	//Custom css
	$custom_css = theme_get_setting('custom_css', 'agage');
	if(!empty($custom_css)):
?>
<style type="text/css" media="all">
<?php print $custom_css;?>
</style>
<?php
	endif;
?>
<?php  global $base_url; ?>
</head>

<body id="page" data-spy="scroll" data-target=".navbar-nav" data-offset="80" class="appear-animate <?php print $classes;?>" <?php print $attributes;?>>
	<div class="ip-header">
    	<div class="ip-logo">
        	<img class="preloaderLogo center-block" src="<?php print $base_url.'/'.path_to_theme();?>/logo.png" alt="preloader">
       	</div>
  		<div class="ip-loader">
    		<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
      			<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
      			<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
    		</svg>
  		</div>
	</div>
	<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
	<?php print $scripts; ?>
</body>
</html>

