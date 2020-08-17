<?php
/*
Template Name: Contact Page Template
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

	<div id="page" class="maincontent" role="main" aria-labelledby="main">

    <div id="main" class="container">
	    <div class="row">

				  <?php
  				  $pageid = ($post->ID);
  				  $cf = get_post_custom($pageid);

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
    				'posts_per_page' 	=> 1,
    				'meta_query' => array(
    						array(
    						'key' => '_page_select',
    						'value'    => $pageid,
    						'compare'    => 'LIKE'
    						))
	         );
	        $newsquery = new WP_Query($newsargs);

	        // CHECK IF PAGE NEEDS LEFT SIDEBAR
         	if (isset($cf['_sections'][0])) {
          	$section = unserialize($cf['_sections'][0]);
          	$firstsection = $section[0]['_title'];
          }
          $parentID = get_post_top_ancestor_id($post);

    			if ( (!empty($firstsection)) || ($post->post_parent) || (!empty($children)) ) {
      			if ( ($newsquery->have_posts()) || ($firstrelatedpagelink !=0 )  || (isset($firstexternal)) || (isset($r_content)) ) {
              $articlecolumn = 6;
            } else {
              $articlecolumn = 9;
            } ?>
        			<?php get_template_part('menus/leftsidebar', 'page'); ?>
          <?php } elseif ( ($newsquery->have_posts()) || ($firstrelatedpagelink != 0)  || (isset($firstexternal)) || (isset($r_content)) ) {
              $articlecolumn = 9;
            } else {
              $articlecolumn = 12;
            } ?>

    			<div id="main-area" class="col-md-<?php echo $articlecolumn; ?> col-sm-12 col-xs-12">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div id="articlesection" class="articlesection" aria-labelledby="articlesection">

    					<?php $gmap = $cf[ '_contact_gmap'][0];
      					$content = get_the_content();
      					$content = apply_filters('the_content', $content);
      					if (!empty($gmap)) {
        					echo '<div class="row"><div class="col-md-12 googlemap">' . $gmap . '</div><div class="col-md-12">' . $content . '</div></div>';
      					} else {
        					echo $content;
        				} ?>
              <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
						</div>

            <?php $sections = unserialize($cf['_sections'][0]);

            	if (!empty($sections[0]['_content'])) {
              	get_template_part('parts/part','section');
            	}
            ?>

					</article>

				</div><!-- END OF SPAN -->


          <?php if ( ($newsquery->have_posts()) || (isset($firstrelatedpagelink))  || (isset($firstexternal)) || (isset($r_content)) ) { ?>
        			<?php get_template_part('menus/rightsidebar', 'page'); ?>
    			<?php } ?>

			</div><!-- END OF ROW -->
    </div><!-- END OF CONTAINER -->

	</div><!-- END OF PAGE -->

	<?php endwhile; endif; ?>

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>