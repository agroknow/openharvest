<?php require_once(drupal_get_path('theme','agage').'/tpl/header.tpl.php'); 

global $base_url;

drupal_add_js(array('baseUrl' => $base_url), 'setting');

libraries_load('leaflet');
drupal_add_library('leaflet_markercluster', 'leaflet_markercluster');

drupal_add_library('ak_cp','ak_cp',FALSE);

drupal_add_js('https://maps.googleapis.com/maps/api/js?libraries=places', 'external');
drupal_add_js('http://maps.stamen.com/js/tile.stamen.js?v1.2.3', 'external');
drupal_add_js(drupal_get_path('module', 'ak_cp') .'/js/ak_cp.js', 'file');

drupal_add_css(drupal_get_path('module', 'ak_cp') .'/css/ak_cp.css', 'file');

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
      <div id="map"></div>
    	<?php print render($page['section_content']); ?>
    	<?php  if($page['content']):?>
    	<div class="container">
          	<div class="row row-padding">
            	<?php print render($page['content']); ?>
            </div>
      	</div>
        <?php endif; ?>
   	</div>
</div>

<?php require_once(drupal_get_path('theme','agage').'/tpl/footer.tpl.php'); ?>