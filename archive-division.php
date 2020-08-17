<?php get_header(); ?>

  <?php if ( ! post_password_required()) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="top" class="container" role="banner" aria-label="main">
  	<div id="titlebar" class="titlecontent col-md-12">
    	<h2><?php the_archive_title(); ?></h2>
  	</div>
	</div>

  	<div id="page" class="maincontent" role="main" aria-labelledby="main">
      <div id="main" class="container">
  	    <div class="row">

    			<div id="left-sidebar" class="col-md-3 hidden-print hidden-xs hidden-sm" role="navigation" aria-label="left-sidebar">
      			<?php
        		  if ( has_nav_menu( 'menu-2' ) ) {
                wp_nav_menu( array(
                  'theme_location'    => 'menu-2',
                  'depth'             => 3,
                  'container'         => false,
                  'menu_class'        => 'nav secondarynav internal')
                );
    				  } else { get_template_part('menus/leftsidebar', 'page'); } ?>
    			</div><!--end of span-->

    			<div id="main-area" class="col-md-8 col-md-offset-1" aria-label="main-area">
    				<?php // get_template_part('breadcrumbs', 'body'); ?>
  					<h2 id="titlebar"><?php the_title(); ?></h2>

    				<?php // echo '<pre>'; print_r($wp_query); echo '</pre>'; ?>

    				<?php
    					$cf = get_post_custom($post->ID);
//    					echo '<pre>'; print_r($cf); echo '</pre>';
    				?>

    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    					<div class="articlesection">
    						<?php the_content(); ?>
    					</div>

            	<?php

            		$sections = unserialize($cf['_sections'][0]);

              	if (!empty($sections[0]['_title'])) {
                	get_template_part('parts/part','section');
              	}

              ?>

    				</article>

    			</div><!-- END OF SPAN -->

        </div><!-- END OF ROW -->

      </div><!-- END OF CONTAINER -->

  	</section><!-- END OF SECTION-->

	<?php endwhile; endif; ?>

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
  <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1" style="padding: 50px 0;text-align:center;">
          <h2>Password Protected Site</h2>
          <?php the_content(); ?>
          <p>Please provide the password given to you by the site administer in order to access this page. <br />If you feel you have reached this message in order, please submit an <a href="<?php echo site_url(); ?>/contact/report-error/" >error report</a>.
          </p>
        </div>
      </div>
    </div>

  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>