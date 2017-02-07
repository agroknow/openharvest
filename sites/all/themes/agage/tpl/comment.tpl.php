<?php 
global $base_url;
?>

<div class="media">
	<div class="media-left">
    	<a href="#">
            <?php
				if(render($content['picture'])){
				  print render($content['picture']);
				}  else {
				  print "<img alt='Default avatar' src='http://dummyimage.com/90x90' srcset='http://dummyimage.com/70x70' class='ro-profile'/>";
				}
			?>
        </a>
    </div>
    <div class="media-body">
        <h5 class="media-heading"><?php print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?></h5>
        <div class="comment-date text-uppercase">
            <?php print format_date($node->created, 'custom', 'F j Y'); ?>
        </div>
        <?php print render($content['comment_body']);?>
    </div>
</div>
