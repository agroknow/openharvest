<?php 

global $base_url;

drupal_add_js(array('baseUrl' => $base_url), 'setting');

libraries_load('leaflet');
drupal_add_library('leaflet_markercluster', 'leaflet_markercluster');

drupal_add_library('ak_cp','ak_cp',FALSE);
$tile_string = 'var customTile = L.tileLayer("http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png", {
                attribution: \'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>\',
                maxZoom: 18,
            });';

$colors_string = 'var typeColors = {
                organization:\'#f47d42\',
                data_point:\'#f44242\',
                initiative:\'#f4425f\',
            };';

drupal_add_js($tile_string . $colors_string, 'inline');

//drupal_add_js('https://maps.googleapis.com/maps/api/js?libraries=places', 'external');
drupal_add_js('http://maps.stamen.com/js/tile.stamen.js?v1.2.3', 'external');
drupal_add_js(drupal_get_path('module', 'ak_cp') .'/js/ak_cp.js', 'file');

drupal_add_css(drupal_get_path('module', 'ak_cp') .'/css/ak_cp.css', 'file');

if(!empty($_REQUEST["style"])){
  $style = $_REQUEST["style"];
} else {
  $style = theme_get_setting('style', 'agage'); 
}
if(empty($style)) $style = 'style1';

if (FALSE) {
?>

<?php if($style == 'style1') { ?>
<header>
    <nav id="nav-top" class="clearfix">
        <div class="navbar navbar-nav navbar-static-top default-nav" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <a class="navbar-brand overlay-header-logo" href="<?php print $base_url ?>">
                      <img src="<?php print $base_url.'/'.path_to_theme();?>/logo.jpg" alt="logo" role="banner">
                    </a> 
            <a class="navbar-brand normal-header-logo" href="<?php print $base_url ?>">
                      <img src="<?php print $base_url.'/'.path_to_theme();?>/logo-black.jpg" alt="logo" role="banner">
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="navigation-menu">
                    <ul class="nav navbar-nav">
                      <!--Content menu - update.js-->
                    </ul>
                </div>                
            </div>
        </div>
    </nav>
</header>

<?php } elseif($style == 'style2') { ?>
<header>
    <nav id="nav-top">
        <div class="navbar navbar-nav navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <a class="navbar-brand overlay-header-logo" href="<?php print $base_url ?>"> 
                        <img src="<?php print $base_url.'/'.path_to_theme();?>/logo.jpg" alt="logo" role="banner">
                    </a> 
                    <a class="navbar-brand normal-header-logo" href="<?php print $base_url ?>"> 
                        <img src="<?php print $base_url.'/'.path_to_theme();?>/logo-black.jpg" alt="logo" role="banner">
                    </a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right" id="navigation-menu">
                  <!-- MENU -->
                    <?php print render($page['main_menu']) ?>
                      <!--Content menu - update.js-->
                    </ul>
                </div>
                
            </div>
        </div>
    </nav>
</header>

<?php } elseif($style == 'style3') { ?>
<header>
    <aside id="menu">
        <div id="menu-toggle">
             <span></span> <span></span> <span></span> 
        </div>
        <nav id="nav-side">
            <div class="logo">
                <a href="<?php print $base_url ?>" class="move">
                  <img src="<?php print $base_url.'/'.path_to_theme();?>/logo-black.jpg" alt="">
                </a> 
            </div>
            <ul id="main-menu" class="nav">
              <!--Content menu - update.js-->
            </ul>
        </nav>
    </aside>
</header>

<?php } else { ?>
<header>
    <nav id="nav-icon" class="sidebar-menu">
        <div class="logo">
            <img src="<?php print $base_url.'/'.path_to_theme();?>/logo-4.png" alt="logo 4" />
        </div>
        <div class="en" id="snav">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span></span> <span></span> <span></span> 
            </button>
            <div class="clearfix"></div>
            <ul class="collapse navbar-collapse">
              <!--Content menu - update.js-->
            </ul>
        </div>
    </nav>
</header>

<?php } } ?>

<?php
if($style == 'style4') {
  $body_class = 'pageWrapper';  
} else {
  $body_class = '';
}

$body_class = 'map-page';
?>
<div id="pageWrapper" class="map-page clearfix en-creative <?php print $body_class; ?>">
    <div class="contentWrapper">
          <div class="custom-popup" id="map"></div>
          <div class="tools-container">
          <!-- ctools-modal-openharvest-modal-style -->
              <a class="ctools-use-modal  pull-right add-resource ctools-modal-openharvest-modal-style-fixed" href="modal_forms/nojs/webform/10171"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
          </div>

<?php  if($page['section_content']):?>
        <?php print render($page['section_content']); ?>
        <?php print render($page['top_content']); ?>
<?php endif; ?>
    </div>
</div>
<?php require_once(drupal_get_path('theme','agage').'/tpl/footer-map.tpl.php'); ?>