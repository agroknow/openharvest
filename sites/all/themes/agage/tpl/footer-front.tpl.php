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
$val='footer-white';
?>

<footer class="clearfix <?php print $val;?>" id="page_footer">
    <div class="container text-center">
        <div class="row">
            <!--Footer Copy-->
            <div class="col-md-12">
              <div class="logo-wrap"><img class="footer-main-logo" src="<?php print $base_url.'/'.path_to_theme();?>/logo.png" alt="logo" role="banner">
              <span class="version">alpha</span></div>
              <span class="powered-txt">Powered by</span>
              <img class="footer-sec-logo" src="<?php print $base_url.'/'.path_to_theme();?>/ak_logo.png" alt="logo" role="banner">
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