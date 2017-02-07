<?php 

global $base_url;
?>
<div id="pageWrapper" class="clearfix">
	<div class="contentWrapper">
    	<?php print render($page['section_content']); ?>
   	</div>
</div>

<?php require_once(drupal_get_path('theme','agage').'/tpl/footer.tpl.php'); ?>