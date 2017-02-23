<?php	global $base_url; ?>

<div id="pageWrapper">
 	<div class="contentWrapper">
        <section id="home" class="mainBanner banner-1 parallax">
            <?php  if($page['content']):?>
            <div class="container-fluid">
                <div class="row">
                	<?php
						if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
							print render($tabs);
						endif;
						print $messages;
						//unset($page['content']['system_main']['default_message']);
					?>
                    <div class="col-lg-8 col-md-8 col-md-offset-2">
                        <div class="mainBanner-content page-404 text-center">
                        <img class="center-block not-found-logo" src="<?php print $base_url.'/'.path_to_theme();?>/logo.png" alt="logo">
                            <i class="not-found-icon fa fa-plug fa-5x" aria-hidden="true"></i>
                            <?php print render($page['content']); ?>
                            <p><a class="not-found-home" href="<?php print $base_url ?>">Back to home</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </section>
   	</div>
</div>