    					  <?php $cf = get_post_custom($post->ID);

      					  $columnscount = $cf['_tiledoptions_colspan'][0];
      					  if ($columnscount == 'col2') {
        					  $columns = 'col2';
      					  }
      					  elseif ($columnscount == 'col3') {
        					  $columns = 'col3';
      					  } else {
        					  $columns = 'col4';
      					  }
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'title'
                 );
                $parent = new WP_Query( $args );

                if ( $parent->have_posts() ) : ?>
        					<div class="tiled-listing">
          				  <ul class="<?php echo $columns; ?>">
                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
          							<li>
          							  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            							  <span class="news-thumb">
                              <?php if (has_post_thumbnail() && (get_post_thumbnail_id() != 801) ) { ?>
                                <?php the_post_thumbnail(); ?>
                                <h3><?php echo get_the_title(); ?></h3>
                              <?php } else { ?>
                                <span class="no-image">
                                  <h3><?php echo get_the_title(); ?></h3>
                                </span>
                              <?php } ?>
            							  </span>
                          </a>
              					  <?php if (isset($cf['_tiledoptions_tcontent'][0])) {
                					  $tcontent = $cf['_tiledoptions_tcontent'][0];

                            if ($tcontent == 'include') {
                  					  apply_filters('the_content', the_content());
            					      }
        					        } ?>
                        </li>
                        <?php endwhile; ?>
             			  </ul>
        					</div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
