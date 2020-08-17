<?php
	$themesitelogo = get_option( 'theme_site_logo' );
	$themesitedept = get_option( 'theme_site_dept' );
	$themesitename = get_option( 'theme_site_name' );

  if($post) {
  	$ancestorID = get_post_top_ancestor_id($post);
  	$parentID = get_the_id($post->post_parent);
  }

  include (get_template_directory(). '/library/includes/2.0.1/starter-supernav.php'); ?>
	<div id="logoholder" class="container-fluid" role="banner" aria-label="logoholder">
		<div class="container">
			<div class="row">
				<div id="deplogo" class="col-md-7 col-sm-12 col-xs-12">
						<h1 class="h2"><a href="<?php echo site_url(); ?>" id="pageTop" title="Visit the page of <?php bloginfo( 'name' ); ?> ">
        					<?php if (!empty($themesitelogo)) { ?>
        					  <img src="<?php echo $themesitelogo; ?>" alt="<?php bloginfo( 'name' ); ?> logo" class="logo img-fluid">
        					<?php } else if (!empty($themesitedept)) { ?>
        						<span class="mms-text"><?php echo $themesitedept; ?></span> <?php echo $themesitename; ?>
        					<?php } else { echo bloginfo( 'name' ); } ?>
	  					</a>
						</h1>
				</div>
				<div id="mms-logo" class="col-md-5 col-sm-12 col-xs-12">
					<a href="https://med.uth.edu/"><img src="<?php echo get_template_directory_uri(); ?>/library/includes/2.0.1/logos/mcgovern-horizontal-footer.png" alt="McGovern Medical School Logo"/><span>McGovern Medical School</span></a>
				</div>
			</div><!-- /ending header row -->
		</div><!-- /container -->
	</div> <!-- /logoholder -->

	<div id="navigationdiv" role="navigation" aria-label="navigationdiv">
		<nav class="navbar navbar-theme">
			<div class="navbar-header">
				<div class="container-fluid">
					<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="hamburgerbtn-txt">Click for Navigation <span class="fa fa-reorder"></span></span>
					</button>
				</div>
				<div class="container">
					<div class="collapse navbar-toggleable-sm" id="navbar-collapse">
						<?php
							wp_nav_menu( array(
								'theme_location'    => 'menu-1',
								'depth'             => 2,
								'container'         => false,
								'menu_id'           => 'mainmenu',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);

							// GET CUSTOM FIELDS FROM OPTIONS --> SHOULD CHANGE TO CUSTOMIZER

							$menu_button_label = get_option( 'theme_menu_button_label' );
							$menu_button_link = get_option( 'theme_menu_button_link' );

							if (!empty($menu_button_link)) { ?>
								<div><a class="btn btn-donate" href="<?php echo $menu_button_link; ?>" title="Visit the page of <?php echo $menu_button_label; ?>"><?php echo $menu_button_label; ?></a></div>
							<?php } ?>

					</div><!-- /ending collapse -->
				</div><!-- /ending container -->
			</div><!-- /ending navbar-header -->
		</nav><!-- /ending navbar navbar-theme-->
	</div><!-- /ending navigationdiv -->