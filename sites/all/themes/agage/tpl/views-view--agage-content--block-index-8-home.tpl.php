<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/slider/21.jpg"></div>
<div class="home-logo"><img src="<?php print $base_url.'/'.path_to_theme();?>/images/logo/logo-black.png" alt="logo"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-md-offset-2">
            <div class="mainBanner-content text-uppercase">
				<?php print $rows; ?>
                <a href="#about-us" class="btn-bdr black-bdr move black">GET TO KNOW MORE</a><span class="downArrow">
                <img src="<?php print $base_url.'/'.path_to_theme();?>/images/others/down-arrow-black.png" alt="down arrow"></span>
          	</div>
        </div>
    </div>
</div>
<?php endif; ?>
