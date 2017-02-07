<?php  global $base_url; ?>

<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/12.jpg"></div>

<div class="parallax-overlay bg-strip"></div>
<div class="container-fluid">
    <div class="row">
        <?php if ($header): ?>
        <div class="container backDivLeft">
            <div class="split-section-headings pull-left">
                <div class="row-padding">
                    <div class="col-md-10">
                        <div class="heading wow fadeIn" data-wow-delay="0.5s" data-wow-duration=".7s">
							<?php print $header; ?>
                       	</div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="split-section-content pull-right">
            <div id="services-block" class="clearfix">
				<?php print $rows; ?>
           	</div>
        </div>
    </div>
</div>
<div class="space-cover leftAl bgColor1 img-holder-2"></div>
<?php endif; ?>
