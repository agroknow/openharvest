<?php require_once(drupal_get_path('theme','agage').'/tpl/header.tpl.php'); 

global $base_url;

if(!empty($_REQUEST["blog"])){
	$blog = $_REQUEST["blog"];
} else {
	$blog = theme_get_setting('blog_style', 'agage'); 
}
if(empty($blog)) $blog = 'normal';

$blog_class = '';
if($blog == 'minimal'){
	$blog_class = 'minimal';
}
?>
<?php if(arg(0)=='node'){ ?>
<div id="pageWrapper" class="clearfix">
	<div class="contentWrapper">
    	<section id="blog-main" class="clearfix bgColor2">
        	<div class="blog-body blog-inner clearfix">
            	<div class="container">
                	<div class="row row-padding">
            			<article class="posts clearfix">
                        	<?php print render($page['top_content']); ?>
                            <aside>
                				<div class="col-md-3">
                  					<div class="blog-siderbar">
                        				<?php print render($page['sidebar']); ?>
                                    </div>
                                </div>
                            </aside>
                        </article>
                   	</div>
                </div>
                <?php print render($page['content']); ?>
            </div>
        </section>
    </div>
</div>
<?php } else { ?>
<div id="pageWrapper" class="clearfix">
	<div class="contentWrapper <?php print $blog_class; ?>">
   		<?php print render($page['section_content']); ?>
   	</div>
</div>
<?php } ?>


<?php require_once(drupal_get_path('theme','agage').'/tpl/footer.tpl.php'); ?>