<?php get_header(); ?>

  <?php if ( ! post_password_required()) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) { ?>
  		<div id="top" role="banner" aria-label="top">
    		<div class="container-fluid featured-image"><?php the_post_thumbnail(' aligncenter img-fluid featured-image-fullwidth'); ?></div>
        <div class="container">
    			<div id="titlebar" class="titlecontent col-md-12">
      			<h2><?php the_title(); ?></h2>
    			</div>
        </div>
  		</div>
		<?php } else { ?>
        <div id="top" class="container" role="banner" aria-labelledby="titlebar">
    		  <div id="titlebar" class="titlecontent col-md-10 col-md-offset-2 col-xs-12">
  					<h2><?php the_title(); ?></h2>
    		  </div>
        </div>
		<?php } ?>

  	<div id="page" class="maincontent" role="main" aria-labelledby="main">
      <div id="main" class="container">
  	    <div class="row">
    			<div id="left-sidebar" class="col-md-2 hidden-print hidden-xs hidden-sm">
      			<?php get_template_part('menus/leftsidebar', 'post');?>
    			</div><!--end of span-->

    			<?php $postID = get_the_ID();
      		$postTitle = get_the_title();
      		$cf = get_post_custom($postID);

      		if ( ($cf['_page_select'][0]) > 0 ) {
          	$pageselects = unserialize($cf['_page_select'][0]);
          	$articlecolumn = '7';
          }
          else if ( isset($cf['_faculty_faculty'][0]) ) {
          	$facultymembers = unserialize($cf['_faculty_faculty'][0]);
          	$articlecolumn = '10';
          } else {
            $articlecolumn = '10';
          }
          ?>

    			<div id="main-area" class="col-md-<?php echo $articlecolumn; ?>">
    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> aria-labelledby="articlesection">
    					<div id="articlesection" class="articlesection">
    						<?php the_content(); ?>
    					</div>
    				</article>

    			</div><!-- END OF SPAN -->

          <?php
          if (isset($pageselects)) { ?>
      			<div id="right-sidebar" class="col-md-3 hidden-print hidden-xs hidden-sm" role="navigation" aria-label="right-sidebar">
            <?php get_template_part('menus/rightsidebar', 'post'); ?>
      			</div>
          <?php } ?>

        </div><!-- END OF ROW -->

      </div><!-- END OF CONTAINER -->

  	</div><!-- END OF SECTION-->

	<?php endwhile; endif; ?>

  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
  <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1" style="padding: 50px 0;text-align:center;">
          <h2>Password Protected Site</h2>
          <?php the_content(); ?>
          <p>Please provide the password given to you by the site administer in order to access this page. <br />If you feel you have reached this message in order, please submit an <a href="<?php echo site_url(); ?>/contact/report-error/" >error report</a>.
          </p>
        </div>
      </div>
    </div>

  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>