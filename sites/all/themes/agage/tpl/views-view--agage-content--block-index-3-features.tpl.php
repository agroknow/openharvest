<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container-fluid paddrl0">
    <div class="row row-padding paddtb0">
        <div class="features6 feat-2">
			<?php print $rows; ?>
        </div>
    </div>
</div>
<?php endif; ?>
