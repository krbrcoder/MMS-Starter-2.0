<?php get_header(); ?>

	<?php
		$allsearch = new WP_Query("s=$s&posts_per_page=999");
		$key = esc_html($s, 1);
		$count = $allsearch->post_count; _e(''); _e('<span class="search-terms">');
	?>

	<div id="titlebar" class="titletexture" role="banner" aria-label="titlebar">
    <div class="container">
	    <div class="row">
				<div class="col-md-12 col-sm-12">
					<h2 id="top">Search Results</h2>
				</div><!--end of span-->
			</div><!-- endof row-->
    </div><!--end of container-->
	</div><!-- end of full-width-->

	<div id="page" class="maincontent" role="main" aria-labelledby="main">
    <div id="main" class="container">
	    <div class="row">
  			<div class="col-md-12 col-sm-12">
  				<article>
  					<div id="articlesection" class="articlesection" aria-labelledby="articlesection">
      				<?php if (have_posts()) { ?>
    						<ol class="search-results">
    						<?php while ( have_posts() ) : the_post(); ?>
    							<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a><br />
    							<small><a href="<?php the_permalink(); ?>"><em><?php echo the_permalink(); ?></em></a></small></li>
    						<?php endwhile; ?>
    						</ol>
    					<?php } else { ?>
	  						<h2>Oops! <?php echo $count; ?> results for <span class="search-key">"<?php echo $key;?>"</strong></h2>
              <?php } ?>
    					<p>Not what you're looking for? Try again:</p>
              <form class="form-inline" role="search" action="<?php echo home_url( '/' ); ?>" method="get" >

              	<div class="input-group">
              		<label for="t" class="sr-only">Search this department</label>
              	  <input type="text" placeholder="Search Site..." class="form-control search-query" name="s" id="t">

              	  <span id="404search" class="input-group-btn">

              	  <button id="deptsearchsubmit-site" type="submit" class="btn btn-default"><span class="fa fa-search"></span><span class="sr-only">Submit</span></button>
              	  </span>
              	</div>
              </form>
  					</div>
  				</article>
			</div><!--end of span-->

		</div><!-- endof row-->

    </div><!--end of container-->

	</div><!--end of main-content-->

<?php get_footer(); ?>
