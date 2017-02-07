<?php	global $base_url; ?>
<?php
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
	endif;
	print $messages;
	//unset($page['content']['system_main']['default_message']);
?>
<div id="pageWrapper">
  	<div class="contentWrapper">
    	<section id="home" class="mainBanner banner-3 coming-soon parallax clearfix" data-background="..images/slider/8.jpg">
        	<?php print render($page['top_content']); ?>
    		<div class="parallax-overlay bg-strip"></div>
      		<div class="container">
        		<div class="row">
          			<div class="col-lg-8 col-md-8 col-md-offset-2">
            			<div class="mainBanner-content text-center">
                        	<?php  if($page['logo_header']):?>
                        	<div class="home-logo-centr">
                            	<?php print render($page['logo_header']) ?>
                            </div>
                            <?php endif; ?>
                            
                            <?php print render($page['content']) ?>
                            
                            <?php  if($page['bot_content_1']):?>
                            <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
                            	<?php print render($page['bot_content_1']) ?>
                            </div>
                            <?php endif; ?>
                        </div>
                   	</div>
              	</div>
           	</div>
            <?php  if($page['bot_content_2']):?>
            	<?php print render($page['bot_content_3']) ?>
            <?php endif; ?>
        </section>
        <?php  if($page['bot_content_3']):?>
        <section class="clearfix">
          	<div class="container">
              	<div class="row row-padding">
                 	<div class="col-sm-8 col-sm-offset-2 text-center">
                 		<?php print render($page['bot_content_3']) ?>
                 	</div>
              	</div>
           	</div>
       	</section>
        <?php endif; ?>
    </div>  
</div>
<?php require_once(drupal_get_path('theme','agage').'/tpl/footer.tpl.php'); ?>