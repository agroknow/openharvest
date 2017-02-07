<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
        <div class="col-sm-12">
            <div class="col-md-6 col-md-offset-3"><?php print $footer; ?></div>
            <div class="heading text-center">
                <div class="title-style-1 trans-bdr-center"><?php print $header; ?></div>
                <div class="features5 marginTop clearfix"><?php print $rows; ?></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
