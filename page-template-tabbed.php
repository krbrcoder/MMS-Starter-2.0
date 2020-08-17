<?php
/*
Template Name: Tabbed Page
*/
?>

<?php get_header();
  if ( ! post_password_required()) {
    if (have_posts()) : while (have_posts()) : the_post();

    $pageid = $post->ID;
		$cf = get_post_custom($pageid);
		$sections = unserialize($cf['_tabs'][0]);

		?>

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

          <?php if (isset($sections[0]['__title'])) { ?>

              <?php get_template_part('menus/part', 'tabsleftbar'); ?>

				  <?php
          if (isset($cf['_additional_page'][0])) {
          	$relatedpage_data = unserialize($cf['_additional_page'][0]);
          	if ($relatedpage_data[0] != 0) {
            	$firstrelatedpagelink = $relatedpage_data[0];	// if this = 0, assume no related page is selected
            }
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

          if ( ($newsquery->have_posts()) || (!empty($firstrelatedpagelink)) || (isset($firstexternal)) || (isset($r_content)) ) {
            $articlecolumn = '6';
          } else {
            $articlecolumn = '9';
          }
    			?>

      			<div id="main-area" class="col-md-<?php echo $articlecolumn; ?> col-xs-12">
    				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    					<div class="articlesection tab-content" id="articlesection" aria-label="articlesection" >
        		  <?php if (isset($sections[0]['__title'])) { get_template_part('parts/part','tabs'); } ?>
                <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
          <?php } ?>
    					</div>
    				</article>
          </div><!-- END OF MAIN-AREA -->

          	<?php if ( (isset($newsquery)) || (!empty($firstrelatedpagelink)) || (isset($firstexternal)) || (isset($r_content)) ) { ?>
          			<?php get_template_part('menus/rightsidebar', 'nofaculty'); ?>
      			<?php } ?>

      </div><!-- END OF ROW -->
      </div><!-- END OF CONTAINER -->
  	</div><!-- END OF PAGE-->

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