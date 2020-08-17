<?php
/*
Template Name: Faculty Listing Template
*/
?>
<?php get_header(); ?>

  <?php if ( ! post_password_required()) { ?>
	<?php $cf = get_post_custom($post->ID); ?>

		<?php if ( has_post_thumbnail() ) { ?>
  		<div id="top" role="banner" aria-label="top">
    		<div class="container featured-image"><?php the_post_thumbnail(' aligncenter img-fluid featured-image-fullwidth'); ?></div>
        <div class="container">
    			<div id="titlebar" class="col-md-12">
      			<h2><?php the_title(); ?></h2>
    			</div>
        </div>
  		</div>
		<?php } else { ?>
  		<div id="top" class="container" role="banner" aria-labelledby="titlebar">
  			<div id="titlebar" class="titlecontent col-md-12">
    			<h2><?php the_title(); ?></h2>
  			</div>
  		</div>
		<?php } ?>

  	<div id="page" class="maincontent" role="main" aria-labelledby="main">
      <div id="main" class="container">
        <div class="row">

				  <?php

          $cf = get_post_custom($post->ID);
          $pageid = $post->ID;

          if ($cf['_facultypageoptions_sidebar_left'][0] == 'yes') {
            $articlecolumn = 9;
            get_template_part('menus/leftsidebar','facultyarchive');
          } else {
            // ADD RIGHT SIDEBAR ABILITY
            $articlecolumn = 12;
          } ?>


    			<div id="main-area" role="main" class="col-md-<?php echo $articlecolumn; ?> tab-content col-sm-12 col-xs-12" aria-label="main-area">
        		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      			  <?php if ( ( $post->post_content !="" ) || ($cf[ '_facultypageoptions_livesearch'][0] == 'yes' ) ) { ?>
          	    <div id="articlesection" class=" col-md-12 articlesection" aria-labelledby="articlesection">
                  <?php if ( $post->post_content !="" ) { the_content(); } ?>
        					<?php $cf = get_post_custom($post->ID);
                  $template_uri = get_template_directory_uri();

                    $facultypageoptions = $cf[ '_facultypageoptions_livesearch'][0];
                    if ($facultypageoptions == 'yes') {
                      get_template_part('parts/part', 'livesearch');
                    } ?>
          			</div>
        			<?php }
      			endwhile; endif;?>
          		<?php if (isset($cf['_facultypagev2div'][0])) { ?>
        				<div class="col-md-12 facultylisting col-sm-12 col-xs-12">
                	<div id="faculty-section" class="row articlesection" aria-label="faculty-section">
            		    <?php get_template_part('parts/part', 'facultylisting'); ?>
                	</div>
      		    	</div><!-- END .col-md-12 .facultylisting -->
      		    	<?php } ?>


              	<?php if (isset($cf['_sections'][0])) {
              		$sections = unserialize($cf['_sections'][0]);
                	if (!empty($sections[0]['_content'])) {
                  	get_template_part('parts/part','section');
                	}
                } ?>

        		</article>
    			</div><!--END MAIN AREA -->

				</div><!-- END ROW -->
	    </div><!-- END TITLEBAR -->
		</div><!-- END CONTAINER-->

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>



<?php get_footer(); ?>