<?php
/**
 * @file
 * Template file for the theming the modal box.
 *
 * Available custom variables:
 * - $site_name
 * - $render_string
 *
 */
?>
<?php 
$path = str_replace('bs_modal/jquery_ajax_load/get/', '', current_path());
$item = menu_get_item($path);
$title = $item['title'];
?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php print($title) ?></h4>
      </div>
<div class="modal-body">
  <?php  print $render_string; ?>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php print t('Close') ?></button>
      </div>