<?php

function ak_lmap_options() {

    $form['lmap_copyright_block'] = array(
    '#type' => 'textfield',
    '#title' => t('Id of copyright block.'),
    '#default_value' => variable_get('lmap_copyright_block','3'),
    );

    $form['lmap_path'] = array(
    '#type' => 'textfield',
    '#title' => t('Path for gln Map'),
    '#default_value' => variable_get('lmap_path','lmap'),
    );
    
    return system_settings_form($form);
}