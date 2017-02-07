<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
        <div class="col-sm-6">
            <div class="heading">
                <div class="title-style-3">
                    <h2 class="text-uppercase"> About</h2>
                    <span class="title-spt"></span>
                </div>
                <?php print $attachment_before; ?>
           	</div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-offset-1">
                <div class="progress-wrapper marT50"><?php print $rows; ?></div>
            </div>
        </div>
    </div>
</div>
<?php print $header; ?>
<?php endif; ?>
