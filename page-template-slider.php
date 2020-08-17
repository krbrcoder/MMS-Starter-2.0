<?php
/*
Template Name: Page with Slider Template
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
				  $cf = get_post_custom($post->ID);

				  if (isset($cf['_facultypagev2div'][0])) {
  				  $facultylisting = unserialize($cf['_facultypagev2div'][0]);
  				  $firstfaculty = $facultylisting[0]['_faculty'][0];
				  }

          if (isset($cf['_additional_page'][0])) {
          	$relatedpage_data = unserialize($cf['_additional_page'][0]);
          	$firstrelatedpagelink = $relatedpage_data[0];	// if this = 0, assume no related page is selected
        	}

        	if (isset($cf['_non_internal'][0])) {
          	$external = unserialize($cf['_non_internal'][0]);
          	$firstexternal = $external[0]['_title'];
          }

        	if (!empty($cf['_pg_settings_r_content'][0])) {
          	$r_content = $cf['_pg_settings_r_content'][0];
          }

	        // CHECK IF PAGE NEEDS LEFT SIDEBAR
         	if (isset($cf['_sections'][0])) {
          	$section = unserialize($cf['_sections'][0]);
          	$firstsection = $section[0]['_title'];
          }
          $parentID = get_post_top_ancestor_id($post);
    			$children = wp_list_pages("title_li=&child_of=".$parentID."&echo=0&sort_order=ASC");


    			if ( (!empty($firstsection)) || (is_page() && $post->post_parent) || ($children) ) {
      			if ( ($firstfaculty != 0 ) || ($firstrelatedpagelink != 0)  || (!empty($firstexternal)) || (!empty($r_content)) ) {
              $articlecolumn = 6;
            } else {
              $articlecolumn = 9;
            } ?>
        			<?php get_template_part('menus/leftsidebar', 'page'); ?>
          <?php } elseif ( ($firstfaculty != 0 ) || ($firstrelatedpagelink != 0)  || (!empty($firstexternal)) || (!empty($r_content)) ) {
              $articlecolumn = 9;
            } else {
              $articlecolumn = 12;
            } ?>

    			<div id="main-area" class="col-md-<?php echo $articlecolumn; ?> col-sm-12 col-xs-12">

    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        			<?php $slideshow = unserialize($cf['_slider'][0]);
        				if (!empty($slideshow)) {
        					get_template_part('parts/part', 'slider');
          		  } ?>

    					<div class="articlesection" id="articlesection" aria-label="articlesection" >
      						<?php the_content(); ?>
                  <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
    					</div>

            	<?php if (isset($cf['_sections'][0])) {
            		$sections = unserialize($cf['_sections'][0]);
              	if (!empty($sections[0]['_content'])) {
                	get_template_part('parts/part','section');
              	}
              } ?>
    				</article>

    			</div><!-- END OF SPAN -->

          <?php if ( ($firstfaculty != 0 ) || ($firstrelatedpagelink != 0)  || (!empty($firstexternal)) || (isset($r_content)) ) { ?>
        			<?php get_template_part('menus/rightsidebar' , 'page'); ?>
    			<?php } ?>
        </div><!-- END OF ROW -->
      </div><!-- END OF MAIN -->
  	</div><!-- END OF PAGE -->

	<?php endwhile; endif; ?>


  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>



<?php get_footer(); ?>