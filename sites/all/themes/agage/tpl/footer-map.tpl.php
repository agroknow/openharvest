<?php  global $base_url; ?>
<?php
if(!empty($_REQUEST["style"])){
	$style = $_REQUEST["style"];
} else {
	$style = theme_get_setting('style', 'agage'); 
}
if(empty($style)) $style = 'style1';

$val='';
if ($style != 'style1') { 
	$val = 'footer-black';
}
?>

<footer class="clearfix <?php print $val;?> white" id="page_footer">
    <div class="container-fluid text-center">
        <div class="row">
            <!--Footer Copy-->
            <div class="col-md-12">
              <div class="logo-wrap pull-left"><img class="footer-main-logo" src="<?php print $base_url.'/'.path_to_theme();?>/logo_neg.png" alt="logo" role="banner">
              <span class="version">alpha</span>
              </div>
              <div class="powered-wrap pull-right">
              <span class="powered-txt"><?php print theme_get_setting('footer_copyright_message','agage'); ?></span>
              <!-- <img class="footer-sec-logo" src="<?php // print $base_url.'/'.path_to_theme();?>/ak_logo_neg.png" alt="logo" role="banner"> -->
              </div>
            </div>
            <?php if(FALSE) { ?>
            <div class="col-md-8">
            <h5 class="copyright text-uppercase">
				<?php //print theme_get_setting('footer_copyright_message','agage'); ?>
            </h5>
            <!--/ Footer Copy-->
            <!--Footer Social Icon-->
            <?php print render($page['footer_social']) ?>
            <!--/ Footer Social Icon-->
            </div>
            <?php } ?>
        </div>
    </div>
</footer>