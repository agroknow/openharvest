<?php require_once(drupal_get_path('theme','agage').'/tpl/header.tpl.php'); 

global $base_url;
?>

<div id="pageWrapper" class="clearfix">
    <div class="contentWrapper">
        <section id="blog-main" class="clearfix bgColor2">
            <div class="blog-body blog-inner clearfix">
                <div class="container">
                    <div class="row row-padding">
                        <div class="col-md-9 clearfix">
                        	<div class="blogListWrapper">
    							<div class="post-result-title">
        							<h5>
                                    	<span class="uppercase">
                                    		<?php print $breadcrumb; ?>
                                        </span>: 
                                        <span class="result">0 post found</span>
                                   	</h5>
    							</div>
								<?php print render($page['content']); ?>
                            </div>
                       	</div>
                        <div class="col-md-3">
                        	<aside>
                            	<div class="blog-siderbar">
                            		<?php print render($page['sidebar']); ?>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php require_once(drupal_get_path('theme','agage').'/tpl/footer.tpl.php'); ?>
