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

<footer class="clearfix <?php print $val;?>" id="page_footer">
    <div class="container text-center">
        <div class="row">
            <!--Footer Copy-->
            <h5 class="copyright text-uppercase">
				<?php print theme_get_setting('footer_copyright_message','agage'); ?>
            </h5>
            <!--/ Footer Copy-->
            <!--Footer Social Icon-->
            <?php print render($page['footer_social']) ?>
            <!--/ Footer Social Icon-->
        </div>
    </div>
</footer>