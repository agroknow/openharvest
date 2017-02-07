<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
    	<?php if ($footer): ?>
        <div class="col-md-6">
            <div class="heading">
                <div class="title-style-2 bg-center">
                    <div class="title-2"><?php print $footer; ?></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($header): ?>
        <div class="col-md-6">
            <div id="filters-container" class="cbp-l-filters-alignRight filters-2">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All </div>
                <?php print $header; ?></div>
        </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div id="portfolio-grid-container" class="cbp-l-grid-projects" data-caption="overlayBottomReveal" data-animation="slideLeft" data-gaphorizontal="38" data-gapvertical="50" data-logo="<?php print $base_url.'/'.path_to_theme();?>/images/logo/logo-black.png">
                <?php print $rows; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
