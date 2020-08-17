<?php
/*
Template Name: Services Page Template
*/
?>

<?php
	get_header();
	$pageid = $post->ID;
?>

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

			<div id="page" class="maincontent" role="main" aria-labelledby="main">
				<div id="main" class="container">
					<div class="row">

						<div id="main-area" class="col-md-9 col-xs-12">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="articlesection" id="articlesection" aria-label="articlesection" >
									<?php the_content(); ?>
									<?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
								</div>
							</article>
						</div><!-- end #main-area -->


						<div id="right-sidebar" class="col-md-3" role="navigation" aria-label="right-sidebar">
							&nbsp;
						</div>
					</div><!-- end .row -->
				</div><!-- end #main -->
			</div><!-- end #page -->

	<?php endwhile; endif; ?>

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>

<?php get_footer(); ?>