<?php
/*
Template Name: Division Page
*/
?>

<?php get_header();

  if ( ! post_password_required()) {
    if (have_posts()) : while (have_posts()) : the_post();

    $pageid = $post->ID;
    $cf = get_post_custom($pageid);
    $template_uri = get_template_directory_uri();
		?>

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

            if($cf['_facultypageoptions_sidebar_left'][0] == 'yes') {
              $articlecolumn = 9;
              get_template_part('menus/leftsidebar','page');
            } else {
            $articlecolumn = 12;
            }
           ?>

    			<div id="main-area" class="col-md-<?php echo $articlecolumn; ?> col-sm-12 col-xs-12 " aria-label="main-area">
          		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            	    <?php if ( $post->post_content !="" ) { ?>
              	    <div id="articlesection" class=" col-md-12 articlesection">
                      <?php the_content(); ?>
                      <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
              			</div>
            			<?php } ?>

              		<?php /* FACULTY SECTION */	?>
              		<?php if (isset($cf['_facultypagev2div'][0])) { ?>
                  	<div class="row articlesection">
              		    <?php get_template_part('parts/part', 'facultylisting'); ?>
                  	</div>
              	  <?php } ?>

                	<?php if (isset($cf['_sections'][0])) {
                		$sections = unserialize($cf['_sections'][0]);
                  	if (!empty($sections[0]['_content'])) {
                    	get_template_part('parts/part','section');
                  	}
                  } ?>


          		</article>
            </div><!-- END OF SPAN -->

        </div><!-- END OF ROW -->
      </div><!-- END OF CONTAINER -->
  	</div><!-- END OF PAGE-->

	<?php endwhile; endif; ?>
  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>