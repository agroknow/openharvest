<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
	<div class="row row-padding paddb0">
        <div class="col-sm-12">
            <?php if ($header): ?>
            <div class="welcome-heading text-center">
                <?php print $header; ?>
            </div>
            <?php endif; ?>
            <div class="features6">
                <?php print $rows; ?>
            </div>
        </div>
    </div>
</div>
	
<?php endif; ?>