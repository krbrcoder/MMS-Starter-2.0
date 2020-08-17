<?php
/*
Template Name: Auto-Listing Tiled Parent with Children
*/
?>
<?php get_header(); ?>

<?php if ( ! post_password_required()) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();
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

          if (isset($cf['_additional_page'][0])) {
          	$relatedpage_data = unserialize($cf['_additional_page'][0]);
          	$firstrelatedpagelink = $relatedpage_data[0];	// if this = 0, assume no related page is selected
        	}

        	if (isset($cf['_non_internal'][0])) {
          	$external = unserialize($cf['_non_internal'][0]);
          	if (isset($external['_title'])) {
            	$firstexternal = $external['_title'];
          	}
          }

        	if (!empty($cf['_pg_settings_r_content'][0])) {
          	$r_content = $cf['_pg_settings_r_content'][0];
          }

	        $newsargs = array (
	        	'post_type'			=> 'post',
    				'posts_per_page' 	=> -1,
    				'meta_query' => array(
    						array(
    						'key' => '_page_select',
    						'value'    => $pageid,
    						'compare'    => 'LIKE'
    						))
	         );
	        $newsquery = new WP_Query($newsargs);
	        //echo '<pre>'; print_r($cf); echo '</pre>';

          if ( ($newsquery->have_posts()) || ($firstrelatedpagelink != 0) || (isset($firstexternal)) || (isset($r_content)) ) {
            $articlecolumn = 9;

            /* BEGIN -- TILED PAGE OPTIONS - REMOVE IF NOT TILED */
            if (isset($cf['_tiledoptions_sidebar'][0])) {
              if ($cf['_tiledoptions_sidebar'][0] == 'include') {
                $articlecolumn = 6;
              }
            }
          } elseif (isset($cf['_tiledoptions_sidebar'][0])) {
            if ($cf['_tiledoptions_sidebar'][0] == 'include') {
              $articlecolumn = 9;
            }
            /* END -- TILED PAGE OPTIONS - REMOVE IF NOT TILED */

          } else {
            $articlecolumn = 12;
          }
          wp_reset_postdata();
          ?>

          <?php if ($cf['_tiledoptions_sidebar'][0] == 'include') { ?>
        			<?php get_template_part('menus/leftsidebar', 'tiledparent'); ?>
    			<?php } ?>

    			<div id="main-area" class="col-md-<?php echo $articlecolumn; ?> col-xs-12">

  					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  						<div id="articlesection" class="articlesection" aria-label="articlesection">

                <?php if ( $post->post_content !="" ) { ?>
          				<div id="mainbody" role="tabpanel" aria-label="mainbody">
        						<?php the_content(); ?>
        					  <hr />
                    <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
          				</div>
        				<?php } ?>

        				<?php get_template_part( 'parts/part', 'tiledparent' ); ?>


  						</div>
  					</article>
            	<?php if (isset($cf['_sections'][0])) {
            		$sections = unserialize($cf['_sections'][0]);
              	if (!empty($sections[0]['_content'])) {
                	get_template_part('parts/part','section');
              	}
              } ?>
  				</div><!-- END OF MAIN AREA SPAN -->

      	 <?php if ( ($newsquery->have_posts()) || ($firstrelatedpagelink != 0) || (isset($external)) || (isset($r_content)) ) { ?>
      			<?php get_template_part('menus/rightsidebar', 'nofaculty'); ?>
  			<?php } ?>


			</div><!-- END OF ROW -->
    </div><!-- END OF CONTAINER -->

	</div><!-- END OF PAGE -->

	<?php endwhile; endif; ?>

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>