<?php
global $base_url;

function agage_preprocess_html(&$variables){	
	drupal_add_css('http://fonts.googleapis.com/css?family=Montserrat:400,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=PT+Serif:400,700', array('type' => 'external','media' => 'all'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Raleway:400,600,700,800', array('type' => 'external','media' => 'all'));
	drupal_add_js(path_to_theme().'/js/update.js', array('type' => 'file', 'scope' => 'header'));
	drupal_add_js('https://maps.googleapis.com/maps/api/js', array('type' => 'external', 'scope' => 'header'));
	drupal_add_js('http://code.jquery.com/jquery-latest.min.js', array('type' => 'external', 'scope' => 'header'));
	
	if(!empty($_REQUEST["style"])){
		$style = $_REQUEST["style"];
	} else {
		$style = theme_get_setting('style', 'agage'); 
	}
	if(empty($style)) $style = 'style1';

	
	if($style == 'style3'){
		$nav = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/nav/side-push-menu.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($nav, 'nav');
	} elseif($style == 'style4') {
		$nav = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/nav/sidebar-menu.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($nav, 'nav');
	} else {
		$nav = array(
		'#tag' => 'link',
		'#attributes' => array(
			'href' => base_path().path_to_theme().'/css/nav/navigation-top.css', 
			'rel' => 'stylesheet',
			'type' => 'text/css',
			),
		'#weight' => 1,
		);
		drupal_add_html_head($nav, 'nav');
	}
	
	$hover = array(
	'#tag' => 'link',
	'#attributes' => array(
		'href' => base_path().path_to_theme().'/css/hover/hover_pack.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',
		),
	'#weight' => 2,
	);
	drupal_add_html_head($hover, 'hover');
	
	
	$countdown = array(
	'#tag' => 'link',
	'#attributes' => array(
		'href' => base_path().path_to_theme().'/css/countdown/countdown.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',
		),
	'#weight' => 3,
	);
	drupal_add_html_head($countdown, 'countdown');
	
	$stylescss = array(
	'#tag' => 'link',
	'#attributes' => array(
		'href' => base_path().path_to_theme().'/css/styles.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',
		),
	'#weight' => 4,
	);
	drupal_add_html_head($stylescss, 'stylescss');
	
	$theme = array(
	'#tag' => 'link',
	'#attributes' => array(
		'href' => base_path().path_to_theme().'/css/theme.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',
		),
	'#weight' => 5,
	);
	drupal_add_html_head($theme, 'theme');
	
	$responsive = array(
	'#tag' => 'link',
	'#attributes' => array(
		'href' => base_path().path_to_theme().'/css/responsive.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',
		),
	'#weight' => 6,
	);
	drupal_add_html_head($responsive, 'responsive');
	
	$update = array(
	'#tag' => 'link',
	'#attributes' => array(
		'href' => base_path().path_to_theme().'/css/update.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',
		),
	'#weight' => 7,
	);
	drupal_add_html_head($update, 'update');

	
}

// Remove superfish css files.
function agage_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}


function agage_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
		
	}
}

function hook_preprocess_page(&$variables) {	
	if (arg(0) == 'node' && is_numeric($nid)) {
    	if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
      		$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
      		if (empty($variables['node_content']['field_show_page_title'])) {
        		$variables['node_content']['field_show_page_title'] = NULL;
      		}
    	}
  	}
	
  if (arg(0) == 'taxonomy' && arg(1) == 'term' )
  {
    $term = taxonomy_term_load(arg(2));
    $vocabulary = taxonomy_vocabulary_load($term->vid);
    $variables['theme_hook_suggestions'][] = 'page__taxonomy_vocabulary_' . $vocabulary->machine_name;
  }
}

function agage_preprocess_page(&$vars){

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__node__'. $vars['node']->nid;
	}
	
	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}


	if (isset($vars['node'])) :
		//print $vars['node']->type;
        if($vars['node']->type == 'page'):
            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
			//sidebar
			$output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;
}

function agage_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '';
		foreach($breadcrumb as $value) {

			$crumbs .= $value.' <i class="icon ion-chevron-right font13"></i> ';
		}
		$crumbs .= drupal_get_title();
		return $crumbs;
	}else{
		return NULL;
	}
}

//custom main menu
function agage_menu_tree__main_menu(array $variables) {
	return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}

//next and prev
function agage_prev_next($nid = null, $ntype = null, $op = 'p') {
	if ($op == 'p') {
		$sql_op = '<';
		$order = 'DESC';
	} else{
		$sql_op = '>';
		$order = 'ASC';
	}
	$return_string = '' ;
	$nids = db_query("SELECT n.nid FROM {node} n 
				   WHERE n.nid $sql_op :nid 
				   AND n.status = 1
				   AND n.type = :type
				   ORDER BY n.nid $order
				   LIMIT 1",array(':nid' => $nid, ':type' => $ntype))->fetchCol();
	$nodes = node_load_multiple($nids);
	if (!empty($nodes)):
		foreach ($nodes as $node) :
			if ($op == 'p') {
				$return_string .= '<a href="'.url("node/" . $node->nid).'"><span class="icon ion-chevron-left"></span><span>Old posts</span></a>';
			} else{
				$return_string .= '<a href="'.url("node/" . $node->nid).'"> <span>New posts</span> <span class="icon ion-chevron-right"></span></a>';
			}
		endforeach;
	endif;
	return $return_string;
	
}