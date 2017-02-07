<?php	global $base_url; ?>

<div id="pageWrapper">
 	<div class="contentWrapper">
        <section id="home" class="mainBanner banner-1 parallax" data-background="<?php print $base_url.'/'.path_to_theme();?>/images/slider/4.jpg">
            <div class="parallax-overlay bg-strip"></div>
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
                            <?php print render($page['content']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </section>
   	</div>
</div>