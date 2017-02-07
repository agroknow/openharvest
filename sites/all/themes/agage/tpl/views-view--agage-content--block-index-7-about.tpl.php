<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
        <div class="col-sm-5 col-sm-offset-7">
            <div class="heading wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                <div class="title-style-3">
                    <h2 class="text-uppercase"> About</h2>
                    <span class="title-spt"></span>
               	</div>
                <?php print $attachment_before; ?>
            </div>
            <div class="col-sm-11">
                <div class="progress-wrapper marT50 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                    <h5>I AM GOOD AT</h5>
                    <?php print $rows; ?>
              	</div>
            </div>
        </div>
    </div>
</div>
<?php print $attachment_after; ?>
<?php endif; ?>
