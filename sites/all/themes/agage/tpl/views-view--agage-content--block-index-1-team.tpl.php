<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
		<?php print $header; ?>
        <div class="col-sm-12">
            <div class="row team-2">
                <div id="team-slider-2"><?php print $rows; ?></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
