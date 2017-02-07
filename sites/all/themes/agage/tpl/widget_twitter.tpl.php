<?php
$twitter_username = $settings['widget_twitter_username'];
$tweets_count = $settings['widget_twitter_tweets_count'];
Global $base_url;
?>

<div class="get-bg" data-bg="<?php print $base_url.'/'.path_to_theme();?>/images/parallaxbg/6.jpg"></div>
<div class="parallax-overlay bg-strip"></div>
<div class="container-fluid">
    <div class="row row-padding">
        <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeIn tp_recent_tweets" data-wow-delay=".5s" data-wow-duration="1s" data-username="rifk_i" data-count="2">
        	<span class="twitt-circle"><i class="fa fa-twitter"></i></span>
            <div class="twitter-slider text-center golo-carousel twitter_feed" data-navigation="false" data-stoponhover="true" data-autoplayspeed="1000" data-dots="true" data-autoplay="true" id="twitter">
            	
            </div>
        </div>
    </div>
</div>


		

<script type="text/javascript" src="<?php print $base_url.'/'.drupal_get_path('module', 'widget');?>/yeah_tweety/twitter.js"></script>
<script type="text/javascript" src="<?php print $base_url.'/'.drupal_get_path('module', 'widget');?>/yeah_tweety/get_tweet.php?url=statuses%2Fuser_timeline.json%3Fscreen_name%3D<?php print $twitter_username; ?>%26count%3D<?php print $tweets_count; ?>"></script>