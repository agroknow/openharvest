<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/6.jpg"></div>
<div class="parallax-overlay bg-strip"></div>
<div class="container-fluid">
    <div class="row">
        <div class="container backDivRight">
            <div class="split-section-headings pull-right">
                <div class="row-padding clearfix">
                    <div class="col-md-10 col-md-offset-2">
                        <div class="heading wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">
                            <div class="title-style-1 title-left trans-bdr-left">
								<?php print $header; ?>
                           	</div>
                        </div>
                        <div id="testimonials-slider" class="golo-carousel testimonials-slider clearfix wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s" data-autoplay="true" data-autoplayspeed="800" data-stoponhover="true" data-dots="true">
							<?php print $rows; ?>
                      	</div>
                    </div>
                </div>
            </div>
        </div>        
		<?php print $footer; ?>
        <div class="space-cover rightAl bgColor1 img-holder-2" ></div>
    </div>
</div>
<?php endif; ?>
