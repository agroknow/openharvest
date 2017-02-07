<?php

/**
 * Implements hook_js_alter().
 */
function aktheme_js_alter(&$js) {
    if(isset($js['sites/all/modules/date/date_popup/date_popup.js'])) {
	unset($js['sites/all/modules/date/date_popup/date_popup.js']);
    }
}


/**
 * theme_checkbox().
 */

function aktheme_checkbox($variables) {
    
  $element = $variables['element'];
  //Check if we have toggle button
  //Add toggle boolean
  $toggle = isset($element['#is_toggle']) ? $element['#is_toggle'] : FALSE;
  
  $suffix = $toggle ? '' : '<span class="cr"><i class="cr-icon on fa fa-check-square-o"></i><i class="cr-icon off fa fa-square-o"></i></span>';
  $element['#attributes']['type'] = 'checkbox';
  element_set_attributes($element, array('id', 'name', '#return_value' => 'value'));

  // Unchecked checkbox has #value of integer 0.
  if (!empty($element['#checked'])) {
    $element['#attributes']['checked'] = 'checked';
  }
  
  //Add label inside toggle
  if($toggle && is_array($element['#on_off_labels'])) {
    $element['#attributes']['data-on-text'] = $element['#on_off_labels'][1];
    $element['#attributes']['data-off-text'] = $element['#on_off_labels'][0];
  }
  _form_set_class($element, $toggle ? array('form-checkbox','toggle-checkbox') : array('form-checkbox'));

  return '<input' . drupal_attributes($element['#attributes']) . ' />' . $suffix;
}

/**
 * theme_radio().
 */

function aktheme_radio($variables) {
  $element = $variables['element'];
  
  $suffix = '<span class="cr"><i class="cr-icon on fa fa-dot-circle-o"></i><i class="cr-icon off fa fa-circle-o"></i></span>';
  $element['#attributes']['type'] = 'radio';
  element_set_attributes($element, array('id', 'name', '#return_value' => 'value'));

  if (isset($element['#return_value']) && $element['#value'] !== FALSE && $element['#value'] == $element['#return_value']) {
    $element['#attributes']['checked'] = 'checked';
  }
  _form_set_class($element, array('form-radio'));

  return '<input' . drupal_attributes($element['#attributes']) . ' />' . $suffix;
}

function aktheme_field_widget_form_alter(&$element, &$form_state, $context){
    if(isset($context['instance']['widget']['type']) && $context['instance']['widget']['type'] == 'options_onoff') {
	$element['#is_toggle'] = TRUE;
	$element['#on_off_labels'] = isset($context['field']['settings']['allowed_values']) ? $context['field']['settings']['allowed_values'] : array();
    }
}

function aktheme_form_element(&$variables) {
  $element = &$variables['element'];
  $name = !empty($element['#name']) ? $element['#name'] : FALSE;
  $type = !empty($element['#type']) ? $element['#type'] : FALSE;
  $checkbox = $type && $type === 'checkbox';
  $radio = $type && $type === 'radio';

  // Create an attributes array for the wrapping container.
  if (empty($element['#wrapper_attributes'])) {
    $element['#wrapper_attributes'] = array();
  }
  $wrapper_attributes = &$element['#wrapper_attributes'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add wrapper ID for 'item' type.
  if ($type && $type === 'item' && !empty($element['#markup']) && !empty($element['#id'])) {
    $wrapper_attributes['id'] = $element['#id'];
  }

  // Check for errors and set correct error class.
  if ((isset($element['#parents']) && form_get_error($element)) || (!empty($element['#required']) && bootstrap_setting('forms_required_has_error'))) {
    $wrapper_attributes['class'][] = 'has-error';
  }

  // Add necessary classes to wrapper container.
  $wrapper_attributes['class'][] = 'form-item';
  if ($name) {
    $wrapper_attributes['class'][] = 'form-item-' . drupal_html_class($name);
  }
  if ($type) {
    $wrapper_attributes['class'][] = 'form-type-' . drupal_html_class($type);
  }
  if (!empty($element['#attributes']['disabled'])) {
    $wrapper_attributes['class'][] = 'form-disabled';
  }
  if (!empty($element['#autocomplete_path']) && drupal_valid_path($element['#autocomplete_path'])) {
    $wrapper_attributes['class'][] = 'form-autocomplete';
  }

  // Checkboxes and radios do no receive the 'form-group' class, instead they
  // simply have their own classes.
  if ($checkbox || $radio) {
    $wrapper_attributes['class'][] = drupal_html_class($type);
  }
  elseif ($type && $type !== 'hidden') {
    $wrapper_attributes['class'][] = 'form-group';
  }

  // Create a render array for the form element.
  $build = array(
    '#theme_wrappers' => array('container__form_element'),
    '#attributes' => $wrapper_attributes,
  );

  // Render the label for the form element.
  $build['label'] = array(
    '#markup' => theme('form_element_label', $variables),
    '#weight' => $element['#title_display'] === 'before' ? 0 : 2,
  );

  // Checkboxes and radios render the input element inside the label. If the
  // element is neither of those, then the input element must be rendered here.
  if (!$checkbox && !$radio) {
    $prefix = isset($element['#field_prefix']) ? $element['#field_prefix'] : '';
    $suffix = isset($element['#field_suffix']) ? $element['#field_suffix'] : '';
    if ((!empty($prefix) || !empty($suffix)) && (!empty($element['#input_group']) || !empty($element['#input_group_button']))) {
      if (!empty($element['#field_prefix'])) {
        $prefix = '<span class="input-group-' . (!empty($element['#input_group_button']) ? 'btn' : 'addon') . '">' . $prefix . '</span>';
      }
      if (!empty($element['#field_suffix'])) {
        $suffix = '<span class="input-group-' . (!empty($element['#input_group_button']) ? 'btn' : 'addon') . '">' . $suffix . '</span>';
      }

      // Add a wrapping container around the elements.
      $input_group_attributes = &_bootstrap_get_attributes($element, 'input_group_attributes');
      $input_group_attributes['class'][] = 'input-group';
      $prefix = '<div' . drupal_attributes($input_group_attributes) . '>' . $prefix;
      $suffix .= '</div>';
    }

    // Build the form element.
    $build['element'] = array(
      '#markup' => $element['#children'],
      '#prefix' => !empty($prefix) ? $prefix : NULL,
      '#suffix' => !empty($suffix) ? $suffix : NULL,
      '#weight' => 1,
    );
  }

  // Construct the element's description markup.
  if (!empty($element['#description'])) {
    $build['description'] = array(
      '#type' => 'container',
      '#attributes' => array(
        'class' => array('help-block'),
      ),
      '#weight' => isset($element['#description_display']) && $element['#description_display'] === 'before' ? 0 : 2,
      0 => array('#markup' => filter_xss_admin($element['#description'])),
    );
  }

  // Render the form element build array.
  return drupal_render($build);
}


function aktheme_form_element_label(&$variables) {
  $element = $variables['element'];

  // Extract variables.
  $output = '';

  $title = !empty($element['#title']) ? filter_xss_admin($element['#title']) : '';

  // Only show the required marker if there is an actual title to display.
  if ($title && $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '') {
    $title .= ' ' . $required;
  }

  $display = isset($element['#title_display']) ? $element['#title_display'] : 'before';
  $type = !empty($element['#type']) ? $element['#type'] : FALSE;
  $checkbox = $type && $type === 'checkbox';
  $radio = $type && $type === 'radio';

  // Immediately return if the element is not a checkbox or radio and there is
  // no label to be rendered.
  if (!$checkbox && !$radio && ($display === 'none' || !$title)) {
    return '';
  }

  // Retrieve the label attributes array.
  $attributes = &_bootstrap_get_attributes($element, 'label_attributes');

  // Add Bootstrap label class.
  $attributes['class'][] = 'control-label';

  // Add the necessary 'for' attribute if the element ID exists.
  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }

  // Checkboxes and radios must construct the label differently.
  if ($checkbox || $radio) {
    //Modification here for toggle label  
    if(isset($element['#is_toggle']) && $element['#is_toggle']) {
	$display = 'before';
	$title = '<span class="toggle-label">' . $title . '</span>';
    }
    
    if ($display === 'before') {
      $output .= $title;
    }
    elseif ($display === 'none' || $display === 'invisible') {
      $output .= '<span class="element-invisible">' . $title . '</span>';
    }
    // Inject the rendered checkbox or radio element inside the label.
    if (!empty($element['#children'])) {
      $output .= $element['#children'];
    }
    if ($display === 'after') {
      $output .= $title;
    }
  }
  // Otherwise, just render the title as the label.
  else {
    // Show label only to screen readers to avoid disruption in visual flows.
    if ($display === 'invisible') {
      $attributes['class'][] = 'element-invisible';
    }
    $output .= $title;
  }

  // The leading whitespace helps visually separate fields from inline labels.
  return ' <label' . drupal_attributes($attributes) . '>' . $output . "</label>\n";
}


function aktheme_preprocess_html(&$variables) {
  // Backport from Drupal 8 RDFa/HTML5 implementation.
  // @see https://www.drupal.org/node/1077566
  // @see https://www.drupal.org/node/1164926

  // HTML element attributes.
  $variables['html_attributes_array'] = array(
    'lang' => $variables['language']->language,
    'dir' => $variables['language']->dir,
  );

  // Override existing RDF namespaces to use RDFa 1.1 namespace prefix bindings.
  if (function_exists('rdf_get_namespaces')) {
    $rdf = array('prefix' => array());
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $rdf['prefix'][] = $prefix . ': ' . $uri;
    }
    if (!$rdf['prefix']) {
      $rdf = array();
    }
    $variables['rdf_namespaces'] = drupal_attributes($rdf);
  }

  // BODY element attributes.
  $variables['body_attributes_array'] = array(
    'class' => &$variables['classes_array'],
  );
  $variables['body_attributes_array'] += $variables['attributes_array'];

  // Navbar position.
  switch (bootstrap_setting('navbar_position')) {
    case 'fixed-top':
      $variables['body_attributes_array']['class'][] = 'navbar-is-fixed-top';
      break;

    case 'fixed-bottom':
      $variables['body_attributes_array']['class'][] = 'navbar-is-fixed-bottom';
      break;

    case 'static-top':
      $variables['body_attributes_array']['class'][] = 'navbar-is-static-top';
      break;
  }
  //Add a class if ie8
  if(strpos('MSIE 8.0', $_SERVER['HTTP_USER_AGENT']) !== FALSE) { 
    $variables['body_attributes_array']['class'][] = 'ie8';
  }
  
}

function aktheme_form_alter(&$form, &$form_state, $form_id) {
    if(strpos($form_id, 'webform_client_form') !== FALSE) {
	
	$date_fields = array();
	foreach($form['submitted'] as $key => $component) {
	    if($component['#type'] == 'date') {
		$date_fields[] = $key;
		
		$form['submitted'][$key] = array(
		    '#type' => 'date_popup',
		    '#title' => $component['#title'],
		    '#default_value' => $component['#default_value'],
		    '#date_type' => DATE_DATETIME,
		    '#date_timezone' => ($component['#timezone'] == 'user') ? drupal_get_user_timezone() : variable_get('date_default_timezone', @date_default_timezone_get()),
		    '#date_format' => webform_date_format(),
		    '#date_increment' => 1,
		    //'#date_year_range' => '-3:+3',
		    //'#datepicker_options' => array('minDate' => date('Y-m-d', strtotime("-1 years"))),
		    '#weight' => $component['#weight'],
		);
		$form_state['date_fields'] = $date_fields;
		array_unshift($form['#submit'], 'aktheme_date_weform_submit');
	    }
	}
    }
}

function aktheme_date_weform_submit($form, &$form_state) {
    foreach ($form_state['date_fields'] as $key) {
	$form_state['values']['submitted'][$key] = date_parse($form_state['values']['submitted'][$key]);
    }
}