<?php
	$serviceID = get_the_ID();
	$servicecf = get_post_custom($serviceID);
	if (isset($servicecf['_service_menu_service_menu_selection'][0])){
		$servicemenu = $servicecf['_service_menu_service_menu_selection'][0];
	}

	$ancestorID = get_post_top_ancestor_id($post);
	$parentID = get_the_id($post->post_parent);

	if($post->post_parent) {
		$servicetitle = get_the_title($ancestorID);
		$servicelink = get_permalink($ancestorID);
		$servicechildren = wp_list_pages("title_li=&child_of=".$ancestorID."&depth=2&echo=0&sort_order=ASC");
		$servicethistitle = get_the_title($post->ID); // This is for loading faculty page specific templates
	}
	else {
		$servicetitle = get_the_title($parentID);
		$servicelink = get_permalink($parentID);
		$servicechildren = wp_list_pages("title_li=&child_of=".$parentID."&depth=1&echo=0&sort_order=ASC");
	}


?>

<?php include (get_template_directory(). '/library/includes/2.0.1/starter-supernav.php'); ?>
<div id="logoholder" class="services-logo container-fluid" role="banner" aria-labelledby="deplogo">
	<div class="container">
		<div class="row">
			<div id="deplogo" class="col-md-8">
				<?php
					if ( is_page_template( 'page-template-servicepage.php' ) ) {
						echo '<h1>' . $servicetitle . '</h1>';
					} else {
					echo '<h1>' . get_the_title() . '</h1>';
					}
				?>

			</div>
			<div id="mms-logo" class="col-md-4">
				<h2><a href="https://med.uth.edu/" title="Visit the McGovern Medical School website"><span>McGovern Medical School</span></a></h2>
			</div>
		</div><!-- /ending header row -->
	</div><!-- /container -->
</div> <!-- /logoholder -->

<div id="navigationdiv" class="services-navigation" role="navigation" aria-label="navigationdiv">
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

					if (isset($servicemenu)) {

							wp_nav_menu( array(
								'theme_location'    => $servicemenu,
								'depth'             => 2,
								'container'         => false,
								'menu_id'           => 'mainmenu',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);

					} else {
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
						<?php }
					} ?>


				</div><!-- /ending collapse -->
			</div><!-- /ending container -->
		</div><!-- /ending navbar-header -->
	</nav><!-- /ending navbar navbar-theme-->
</div><!-- /ending navigationdiv -->