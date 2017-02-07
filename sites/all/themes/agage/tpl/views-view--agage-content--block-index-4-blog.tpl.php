<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
    	<?php if ($header): ?>
        <div class="heading text-center">
           	<div class="title-style-1 trans-bdr-center">
				<?php print $header; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="blog-body marT12 clearfix">
            <div class="blog-grid">
				<?php print $rows; ?>
          	</div>
        </div>
        <?php if ($footer): ?>
        <div class="text-center post-btn">
			<?php print $footer; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>