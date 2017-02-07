<?php require_once(drupal_get_path('theme','agage').'/tpl/header.tpl.php'); 

global $base_url;
?>
<?php 
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
	endif;
	print $messages;
	//unset($page['content']['system_main']['default_message']);
?>
<div id="pageWrapper" class="clearfix">
	<div class="contentWrapper">
    	<?php print render($page['section_content']); ?>
    	<?php  if($page['content']):?>
    	<div class="container">
          	<div class="row row-padding">
            	<?php print render($page['content']); ?>
            </div>
      	</div>
        <?php endif; ?>
        Hello map
   	</div>
</div>

<?php require_once(drupal_get_path('theme','agage').'/tpl/footer.tpl.php'); ?>