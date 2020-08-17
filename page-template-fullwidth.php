<?php
/*
Template Name: Full Width Template
*/
?>
<?php get_header(); ?>

  <?php if ( ! post_password_required()) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

	<div id="page" class="maincontent" aria-labelledby="main" role="main">
    <div id="main" class="container">
	    <div class="row">
  			<div class="col-md-12">
  				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  					<div id="articlesection" class="articlesection" aria-labelledby="articlesection">
  						<?php the_content(); ?>
              <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
  					</div>
            	<?php

      					$cf = get_post_custom($post->ID);
            		$sections = unserialize($cf['_sections'][0]);
              	if (!empty($sections[0]['_content'])) {
                	get_template_part('parts/part','pagesection');
              	}
              ?>
					</article>
				</div><!--END OF SPAN -->
			</div><!-- END OF ROW -->
	    </div><!--END OF MAIN -->
	</div><!--END OF PAGE -->

	<?php endwhile; endif; ?>

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>