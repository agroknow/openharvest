<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div id="blog-grid-container" class="cbp-l-grid-blog" data-caption="zoom" data-animation="fadeOut" data-gaphorizontal="50" data-gapvertical="60">
	<?php print $rows; ?>
</div>
<?php endif; ?>