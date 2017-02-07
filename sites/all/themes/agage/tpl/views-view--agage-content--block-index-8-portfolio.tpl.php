<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding paddb0">
        <?php if ($footer): ?>
        <div class="col-md-6">
            <div class="heading">
                <div class="title-style-3">
                    <div class="title-2"><?php print $footer; ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($header): ?>
        <div class="col-md-6">
            <div id="filters-container" class="cbp-l-filters-alignRight filters-3">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item text-uppercase"> All </div>
                <?php print $header; ?></div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="portfolio-grid-container" class="cbp-l-grid-masonry marT15" data-caption="minimal" data-animation="slideDelay" data-gaphorizontal="0" data-gapvertical="0" data-logo="<?php print $base_url.'/'.path_to_theme();?>/images/logo/logo-black.png">
	<?php print $rows; ?>
</div>
<?php endif; ?>
