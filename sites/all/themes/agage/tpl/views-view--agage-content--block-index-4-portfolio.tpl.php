<?php  global $base_url;?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
        <div class="heading text-center">
            <div class="title-style-1 trans-bdr-center"><?php print $footer; ?></div>
        </div>
        <div id="filters-container" class="cbp-l-filters-alignCenter wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s">
            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item text-uppercase"> All
                <div class="cbp-filter-counter"></div>
            </div>
            <?php print $header; ?></div>
        <div id="portfolio-grid-container" class="cbp-l-grid-projects" data-caption="overlayBottomReveal" data-animation="slideLeft" data-gaphorizontal="38" data-gapvertical="50" data-logo="<?php print $base_url.'/'.path_to_theme();?>/images/logo/logo-black.png">
            <?php print $rows; ?></div>
    </div>
</div>
<?php endif; ?>
