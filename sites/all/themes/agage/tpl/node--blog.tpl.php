<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root, $base_url;

?>

<?php if($page) { ?>

<?php print render($content['comments'])?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar-shrink">
                <ul class="pager">
                    <li class="previous text-uppercase"><?php print agage_prev_next($nid,'blog','p'); ?></li>
                    <li class="next text-uppercase"><?php print agage_prev_next($nid,'blog','n'); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php } else {?>

<?php } ?>