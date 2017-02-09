<?php  global $base_url; ?>

<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<?php if ($title): ?>
    <h1 class="views-title"><?php print t($title)?></h1>
<?php endif; ?>


<div class="container">
    <h3><?php echo $view->get_title() ?></h3>
  	<div class="row padding-small">
    	<?php if ($header): ?>
        <div class="heading text-left">
            <div class="title-style-2">
                <?php print $header; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="blog-body marT12 clearfix">
            <div class="a-blog-grid">
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