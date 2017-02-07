<?php  global $base_url; ?>
<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
    	<div class="col-md-3">
        	<div class="heading wow fadeIn" data-wow-delay="0.5s" data-wow-duration=".7s">
				<?php print $header; ?>
           	</div>
       	</div>
      	<div class="col-md-9">
        	<div id="team-slider" class="golo-carousel" data-items="3" data-nav="true" data-autoplayspeed="1000">
				<?php print $rows; ?>
           	</div>
        </div>
    </div>
</div>

<?php endif; ?>
