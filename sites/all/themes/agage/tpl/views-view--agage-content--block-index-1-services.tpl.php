<?php  global $base_url; ?>

<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/20.jpg"></div>
<div class="parallax-overlay bg-strip"></div>
<div class="container-fluid">
    <div class="row">
    	<?php if ($header): ?>
    	<div class="container backDivLeft bg-none">
            <div class="split-section-headings pull-left bg-none">
              	<div class="row-padding">
                	<div class="col-md-10">
                    	<?php print $header; ?>
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

<?php endif; ?>