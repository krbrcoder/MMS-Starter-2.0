<?php get_header(); ?>

	<?php global $wp;
  	$postargs = array('posts_per_page' => -1);
  	$news_query = array_merge( $postargs, (array)$wp->query_vars );
  	query_posts($news_query);
  	if ( have_posts() ) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<div id="top" class="container" role="banner" aria-labelledby="titlebar">
		<div id="titlebar" class="titlecontent col-md-12">
			<h2 id="top">
				<?php
					if ( is_category() ) :
						single_cat_title();
					elseif ( is_tag() ) :
						single_tag_title();
					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'utms' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'utms' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'utms' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
					else :
					endif; ?>
			</h2>
    </div><!--end of TITLECONTENT -->
	</div><!-- end of CONTAINER -->

	<div id="page" class="maincontent" role="main" aria-labelledby="main">

    <div id="main" class="container">

	    <div class="row">

  			<div id="main-area" class="col-md-12">

					<ul id="news-archives">
						<?php while ( have_posts() ) : the_post(); ?>
              <li data-sr="enter left please, and hustle 20px">
  							<a href="<?php echo get_permalink(); ?>" target="_self">
    							<?php if (has_post_thumbnail()) { ?>
    							  <span class="news-thumb"><?php the_post_thumbnail('medium'); ?></span>
      							<h3><?php echo the_title(); ?></h3>
      						<?php } elseif(catch_that_image()) { ?>
        						<span class="news-thumb"><img src="<?php echo catch_that_image(); ?>" alt="image from <?php echo get_the_title(); ?>" /></span>
        						<h3><?php echo the_title(); ?></h3>
        				  <?php } else { ?>
          				  <span class="news-thumb"><span class="no-image"><?php the_title(); ?></span></span>
          				  <h3 class="sr-only"><?php echo get_the_title(); ?></h3>
          				<?php } ?>
                </a>
							<p><?php echo get_the_excerpt(); ?>
							<br /><br /><a class="readmorelink" href="<?php the_permalink(); ?>">Read More <span class="sr-only"><?php the_title(); ?></span><span class="fa fa-angle-double-right"></span></a>
							</p>
							</li>
						<?php endwhile; ?>
					</ul>

			</article>

		</div><!--end of span-->

		</div><!-- endof row-->

    </div><!--end of container-->

	</div><!--end of main-content-->

	<?php endif; ?>
            <script>
              window.sr = new scrollReveal();
            </script>

<?php get_footer(); ?>