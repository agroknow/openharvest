<?php print render($title_prefix); ?>
<?php if ($rows): ?>

<div class="container">
    <div class="row row-padding">
        <div class="heading text-center"><?php print $header; ?></div>
        <div class="services-wrapper"><?php print $rows; ?></div>
    </div>
</div>
<?php endif; ?>
