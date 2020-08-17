		      <?php
		      			$cf = get_post_custom($post->ID);

                if (!empty($cf['_homepage_hp_schedulenow'][0])) {
                  $schedulenow_preg_replace = $cf['_homepage_hp_schedulenow'][0];
                  $schedulenow = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $schedulenow_preg_replace);
                  echo $schedulenow; ?>
                <?php } else if (isset($cf['_homepage_col3_title'][0])) {
  		      			$title = $cf['_homepage_col3_title'][0];
  		      		}
  		      		if(isset($cf['_homepage_col3_body'][0])) {
  		      			$bodyfilter = $cf['_homepage_col3_body'][0];
  		      			$body = apply_filters('the_content', $bodyfilter);
  		      		}
  		      		if(isset($cf['_homepage_col3_link'][0])) {
  		      			$buttonlink = $cf['_homepage_col3_link'][0];
    		      		if(isset($cf['_homepage_col3_btn'][0])) {
    		      			$button = $cf['_homepage_col3_btn'][0];
    		      		} else {
      		      		$button = $buttonlink;
    		      		}
  		      		}
		      ?>
		          <?php if (isset($body)) { ?>
  			        <div class="featured-faculty">
        		      <?php if (!empty($title)) { ?>
        		        <h3><?php echo $title; ?></h3>
        		      <?php } ?>
                  <?php
                    $cat = get_cat_ID('faculty_type');

    		            // Query to show all areas
    		            $featuredargs = array (
    		              'post_type' => 'faculty',
    		              'posts_per_page' => 1,
    		              'faculty_type'  => 'featured',
    		              'orderby'     => 'rand'
    		            );

    		            $featured_query = new WP_Query($featuredargs);

    		            ?>

    		            <?php if ($featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
              				<?php if ( has_post_thumbnail() ) { ?>
          			        <a href="<?php the_permalink(); ?>">
                					<?php the_post_thumbnail('featured-faculty'); ?>
          			        </a>
                			<?php } ?>
            		      <h5><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></h5>
            	        <p><?php echo get_the_excerpt(); ?></p>
        		        <hr/>
          		      <?php endwhile; endif; wp_reset_query(); ?>

        		      <?php if (!empty($body)) { ?>
        		        <?php echo $body; ?>
        		          <?php if ( !empty($button) ) { ?>
                  			<a href="<?php echo $buttonlink; ?>" class="btn btn-primary" title="Go to <?php $button; ?>"><?php echo $button; ?></a>
                			<?php } ?>
        		      <?php } ?>
  			        </div>
			        <?php } ?>
