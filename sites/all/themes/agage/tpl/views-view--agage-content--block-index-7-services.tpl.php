<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="parallax-overlay bg-strip"></div>
<div class="container-fluid">
    <div class="row">
        <?php if ($header): ?>
        <div class="container backDivLeft">
            <div class="split-section-headings pull-left">
                <div class="row-padding">
                    <div class="col-md-10">
                        <div class="heading wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s"><?php print $header; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="split-section-content pull-right">
            <div id="services-block" class="clearfix bgColor3"><?php print $rows; ?></div>
        </div>
    </div>
</div>
<div class="space-cover leftAl bgColor1 img-holder-2"></div>
<?php endif; ?>
