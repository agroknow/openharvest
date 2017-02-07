<?php

function agage_form_system_theme_settings_alter(&$form, $form_state) {
	$theme_path = drupal_get_path('theme', 'agage');
  	$form['settings'] = array(
      '#type' =>'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'agage') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'agage') . '/js/drupalet_admin/admin.js',
					),
			),
  	);
	
	// Tracking code & Css custom
	//==============================
	$form['settings']['general_setting'] = array(
		'#type' => 'fieldset',
		'#title' => t('General Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['general_setting']['general_setting_tracking_code'] = array(
		'#type' => 'textarea',
		'#title' => t('Tracking Code'),
		//'#default_value' => theme_get_setting('general_setting_tracking_code', 'agage'),
	);
	$form['settings']['custom_css'] = array(
		'#type' => 'fieldset',
		'#title' => t('Custom CSS'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['custom_css']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		//'#default_value' => theme_get_setting('custom_css', 'agage'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	);
	//========= End ================
	
	
	// Footer
	//==============================
	$form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message','agage'),
  	);
	//========= End ================
	
	
	
	// Header
	//==============================
	$form['settings']['style'] = array(
      '#type' => 'fieldset',
      '#title' => t('Style Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['style']['style'] = array(
      '#type' => 'select',
      '#title' => t('Style'),
      '#options' => array('style1' => t('Style 1'), 'style2' => t('Style 2'), 'style3' => t('Style 3'), 'style4' => t('Style 4')),
      '#default_value' => theme_get_setting('style','agage'),
	  '#description' => t('Select style of header and footer '),
  	);
	//========= End ================
	
	
	// Blog
	//==============================
	$form['settings']['blog'] = array(
      '#type' => 'fieldset',
      '#title' => t('Blog Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['blog']['blog_style'] = array(
      '#type' => 'select',
      '#title' => t('Blog Style'),
      '#options' => array('normal' => t('Normal'), 'minimal' => t('Minimal')),
      '#default_value' => theme_get_setting('blog_style','agage'),
	  '#description' => t('Select style of blog list ( have summary or not )'),
  	);
	//========= End ================
	
}