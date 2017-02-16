<?php  global $base_url; ?>
<?php if (FALSE) { ?>
<header>
    <nav id="nav-top" class="clearfix">
        <div class="navbar navbar-nav navbar-static-top default-nav" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <a class="navbar-brand overlay-header-logo" href="#home">
                    	<img src="<?php print $base_url.'/'.path_to_theme();?>/logo.png" alt="logo" role="banner">
                   	</a> 
		  			<a class="navbar-brand normal-header-logo" href="#home">
                    	<img src="<?php print $base_url.'/'.path_to_theme();?>/logo_neg.png" alt="logo" role="banner">
                   	</a>
                </div>
                <?php  if($page['main_menu']):?>
                <div class="collapse navbar-collapse navbar-right" id="navigation-menu">
                    <?php print render($page['main_menu']) ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
<?php } ?>
<header>
    <nav id="nav-top">
        <div class="navbar navbar-nav navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <a class="navbar-brand overlay-header-logo" href="<?php print $base_url ?>"> 
                        <img src="<?php print $base_url.'/'.path_to_theme();?>/logo.png" alt="logo" role="banner">
                    </a> 
                    <a class="navbar-brand normal-header-logo" href="<?php print $base_url ?>"> 
                        <img src="<?php print $base_url.'/'.path_to_theme();?>/logo_neg.png" alt="logo" role="banner">
                    </a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right" id="navigation-menu">
                    <?php print render($page['main_menu']) ?>
                    </ul>
                </div>
                
            </div>
        </div>
    </nav>
</header>


