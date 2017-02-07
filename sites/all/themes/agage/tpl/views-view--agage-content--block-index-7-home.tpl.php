<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/2.jpg"></div>
<div class="parallax-overlay bg-strip"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-md-offset-2">
            <div class="mainBanner-content text-uppercase"><?php print $rows; ?><a href="#about-us" class="btn-bdr move"><?php print t('GET TO KNOW MORE');?></a><span class="downArrow"><img src="<?php print $base_url.'/'.path_to_theme();?>/images/others/down-arrow.png" alt="down arrow"></span></div>
        </div>
    </div>
</div>
<?php endif; ?>
