<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<div id="top" class="container" role="banner" aria-label="titlebar">
		<div id="titlebar" class="titlecontent col-md-12">
			<h2>
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
						_e( 'Archives', 'utms' );
					endif; ?>
			</h2>
		</div><!--end of span-->
	</div><!-- end of CONTAINER -->

	<div id="page" class="maincontent" role="main" aria-labelledby="main">
	    <div id="main" class="container">
		    <div class="row">

				<div id="left-sidebar" class="col-md-3" role="navigation" aria-label="left-sidebar">
          <ul class="nav secondarynav">
          <?php
          	//$cf = get_post_custom($post->ID);
          	$pageid = $post->ID;
           ?>
          	<?php /*--------------------------------------------------------------------------------------------------
          			-----------------------------------------  Display Other News ------------------------------------
          			-------------------------------------------------------------------------------------------------- */ ?>
          		<?php
          			$newsargs = array(
          				'posts_per_page' => -1,
          				'category_name'	=> 'news',
          				'post__not_in'	=> array($pageid)
          				);
          			$newsloop = new WP_Query( $newsargs );
          		?>

          		<?php if ( $newsloop->have_posts() ) : ?>
          		<?php echo '<li class="disabled"><a>Recent News</a></li>';
          		while ( $newsloop->have_posts() ): $newsloop->the_post();
          			echo '<li><a href="'. get_permalink() .'" title="'.get_the_title().'">'. get_the_title() . '</a></li>';
          		endwhile;
          		endif; wp_reset_query();
          		?>
          </ul>
				</div><!--end of span-->

				<div id="main-area" class="col-md-8 col-md-offset-1">
					<article>
						<div id="articlesection" class="articlesection" aria-labelledby="articlesection">
							<ul id="news-archives">
								<?php while ( have_posts() ) : the_post(); ?>
									<li><span class="h4"><a href="<?php the_permalink(); ?>" target="_self"><?php echo get_the_title(); ?></a></span>
										<p>
  										<?php echo get_the_excerpt(); ?>
										</p>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</article>
				</div><!--end of span-->

			</div><!-- endof row-->
	    </div><!--end of container-->
	</div><!--end of main-content-->

	<?php endif; ?>

<?php get_footer(); ?>