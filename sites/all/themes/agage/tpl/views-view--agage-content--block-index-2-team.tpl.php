<?php print render($title_prefix); ?>
<?php if ($rows): ?>
  
<div class="container">
    <div class="row row-padding">
    	<?php if ($header): ?>
       	<div class="heading">
            <div class="title-style-2">
                <div class="title-2">
                	<?php print $header; ?>
               	</div>
            </div>
        </div>
        <?php endif; ?>
        <div class="team-3"><?php print $rows; ?></div>
    </div>
</div>
<?php endif; ?>
