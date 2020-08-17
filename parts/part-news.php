                  <h3>Recent News</h3>
                  <ul>

      						<?php 
  									$cf = get_post_custom($post->ID);
  									$news_count = $cf['_homepage_postcount'][0];
                    $news_id = get_cat_ID( 'news' );
        						$news_link = get_category_link( $news_id );
        						$newsargs = array(
        									'posts_per_page' => $news_count,
        									'cat' => $news_id,
        									'order'	=> 'DESC'
        									);
  
        						$newsquery = new WP_Query( $newsargs );
        						if ( $newsquery->have_posts() ) : while ($newsquery->have_posts() ) : $newsquery->the_post(); ?>
        							<li><a href="<?php the_permalink(); ?>" title="Read full news article about <?php the_title(); ?>"><?php the_title(); ?></a></li>
        						<?php endwhile; ?>
                      <li class="news-archive"><a href="<?php echo get_category_link( $news_id ); ?>">View News Archives</a></li>
                      <?php endif; ?>
                    </ul>
                    <?php wp_reset_query(); ?>