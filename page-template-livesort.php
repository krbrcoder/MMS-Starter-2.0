<?php
/*
Template Name: Live Sort Page Template
*/
?>
<?php
	get_header();
	$cf = get_post_custom();
	//echo '<pre>'; print_r($cf); echo '</pre>';
	if (isset($cf['_livesort_postslug'][0])) {
		$postslug = $cf['_livesort_postslug'][0];
	}
	if (isset($cf['_livesort_postslugshort'][0])) {
		$postslugshort = $cf['_livesort_postslugshort'][0];
	}
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
	<?php endwhile; endif; ?>

		<div id="page" class="maincontent" role="main" aria-labelledby="main">
			<div id="main" class="container">
				<div class="row">
					<div id="main-area" class="col-md-12">
						<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>">
							<?php the_content(); ?>
							<?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
						</article>
						<?php endwhile; // end of the loop. ?>

						<?php global $wp;
						$livesort_args = array(
							'category_name'			=> $postslug,
							'posts_per_page' 		=> -1
						);
						$livesort_query = new WP_Query($livesort_args);
						if ( $livesort_query->have_posts() ) :
						$post = $posts[0]; // Hack. Set $post so that the_date() works.
						?>

						<!-- LIVE SEARCH -->
						<div class="row">
							<form id="live-search-<?php $postslugshort ?>" action="" class="form-search" method="post">
								<div class="input-group" role="search" aria-label="live search filter">
									<span class="input-group-addon">Search Filter</span>
									<input type="text" class="form-control" id="filter-<?php $postslugshort ?>" placeholder="Search topic ..." name="Search Term" required aria-label="filter">
									<input class="sr-only" type="submit" value="search">
									<span id="filter-count-<?php $postslugshort ?>" class="input-group-addon"></span>
								</div><!-- END .input-group -->
							</form>
						</div><!-- END .row -->
						<!-- END LIVE SEARCH ROW -->

						<script>
							jQuery(document).ready(function() {

								jQuery("#filter-<?php $postslugshort ?>").keyup(function() {
									// Retrieve the input field text and reset the count to zero
									var filter = jQuery(this).val(), count = 0;

									// Loop through the comment list
									jQuery(".<?php $postslugshort ?>-item").each(function() {
										// If the list item does not contain the text phrase fade it out
										if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
											jQuery(this).fadeOut();
										// Show the list item if the phrase matches and increase the count by 1
										} else {
											jQuery(this).show();
											count++;
										}
									});

									// Update the count
									var numberItems = count;
									jQuery("#filter-count-<?php $postslugshort ?>").text( count+" matches");
									//jQuery("#filter-count").text(count);
								});
							});

							// PREVENT PRESSING RETURN FOR RESULTS
							$('#live-search-<?php $postslugshort ?>').submit(function(e) {
								if (!$('#filter-<?php $postslugshort ?>').val()) {
									e.preventDefault();
								}
							});
						</script>

						<ul id="news-archives">
						<?php while ( $livesort_query->have_posts() ) : $livesort_query->the_post(); ?>
								<li data-sr="enter left please, and hustle 20px" class="<?php $postslugshort ?>-item">
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
						<?php endif; ?>
						</ul>
					</div><!-- END #main-area .col-md-12 -->
				</div><!-- END .row -->
			</div><!-- END #main .container -->
		</div><!-- END #page .maincontent -->

		<script>
			window.sr = new scrollReveal();
		</script>

<?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
	<?php get_template_part('parts/part', 'password'); ?>
<?php } // END IF PASSWORD REQUIRED ?>

<?php get_footer(); ?>