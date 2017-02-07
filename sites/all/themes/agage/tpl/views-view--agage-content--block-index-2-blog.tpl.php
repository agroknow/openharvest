<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
    	<?php if ($header): ?>
        <div class="heading">
            <div class="title-style-2 bg-center">
                <div class="title-2">
					<?php print $header; ?>
                </div>
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