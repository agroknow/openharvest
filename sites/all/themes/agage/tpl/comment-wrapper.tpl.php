<?php
	if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>

<div class="container-fluid clearfix bgColor1">
    <div class="container">
        <div class="row row-padding">
            <div class="boxed-layout">
                <div class="col-md-12">
                    <div class="blog-comments padding-80-0 padding-sm-40-0">
                        <h1 class="text-uppercase"><?php print t('comments');?></h1>
                        <?php print render($content['comments']); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-padding">
        <div class="comment-form">
            <h1 class="text-uppercase"><?php print t('Leave a comment');?></h1>
            <?php print render($content['comment_form'])?>
       	</div>
    </div>
</div>
<?php
	}
?>
