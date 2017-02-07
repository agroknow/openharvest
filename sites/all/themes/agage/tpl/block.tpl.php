<?php 
global $base_url;
$out = '';

if($block->region == 'section_content'){
	$out .= '<section class="clearfix '.$block->css_class.' contextual-links-region">';
	$out .= $content;
	$out .= render($title_suffix);
	$out .= '</section>';
	
} elseif($block->region == 'top_content'){
	$out .= $content;
	
} elseif($block->region == 'sidebar'){
	$out .= '<div class="media-container '.$block->css_class.' contextual-links-region">';
	$out .= render($title_suffix);
	if ($block->subject):
		$out .= '<h4 class="text-uppercase">'.$block->subject.'</h4>';
	endif;
	$out .= $content;
	$out .= '</div>';
	
} else {
	$out .= '<div class="'.$block->css_class.' contextual-links-region">';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
}
print $out;

?>
