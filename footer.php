    <footer id="footer">
    	<div class="container footer">
    		<div class="row">

          <?php
          if ( (is_active_sidebar( 'footer_one_id' )) || ( is_active_sidebar('footer_two_id' )) ) {
            $col_footer1_span = 'col-md-7';
            $col_footer2_span = 'col-md-5';
            if (is_active_sidebar( 'footer_two_id' )) {
              $col_span = 'col-xs-6';
            } else {
              $col_span = 'col-xs-12';
            }
          } else {
            $col_footer1_span = 'col-md-12';
          } ?>

    			<div class="<?php echo $col_footer1_span; ?> col-xs-12">
      			<div class="row">

        			<div class="col-md-5 col-xs-12">
        				<span class="h5"><a href="<?php echo site_url(); ?>" title="Go to <?php echo bloginfo( 'name' ); ?> home">
                  <?php
                    $themesitelogo = get_option( 'theme_site_logo' );
                    $themesitedept = get_option( 'theme_site_dept' );
                    $themesitename = get_option( 'theme_site_name' );
                  ?>
        					<?php if (!empty($themesitelogo)) { ?>
        					  <img src="<?php echo $themesitelogo; ?>" alt="<?php bloginfo( 'name' ); ?> logo" class="logo">
        					  <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
                  <?php } elseif (!empty($themesitedept)) { ?>
        					  <?php echo $themesitedept; ?>
        					  <?php echo $themesitename; ?>
                  <?php } else { echo bloginfo( 'name' ); } ?>
      					</a>
      					<br />
      					<span class="small">at McGovern Medical School</span></span>

                <?php $address = stripslashes(get_option( 'theme_address_area' ));
                  if (!empty($address)) { ?>
            				<address>
            				  <?php echo apply_filters('the_content', $address); ?>
            				</address>
          				<?php } ?>
                  <?php get_search_form(); ?>
                  <?php
                    $facebook = get_option( 'theme_facebook' );
                    $twitter = get_option( 'theme_twitter' );
                    $googleplus = get_option( 'theme_googleplus' );
                    $youtube = get_option( 'theme_youtube' );
                    $instagram = get_option( 'theme_instagram' );
                    $pinterest = get_option( 'theme_pinterest' );
                    $linkedin = get_option( 'theme_linkedin' );

                    if ( (!empty($facebook)) || (!empty($twitter)) || (!empty($googleplus)) || (!empty($youtube)) || (!empty($instagram)) || (!empty($pinterest)) || (!empty($linkedin)) ) {
                    ?>
              				<ul class="social list-inline hidden-print">
                				<?php if (!empty($facebook)) { ?>
                  				<li><a href="<?php echo $facebook; ?>"><span class="sr-only">Like us on Facebook</span><span class="fa fa-facebook"></span></a></li>
                				<?php } ?>
                				<?php if (!empty($twitter)) { ?>
                  				<li><a href="<?php echo $twitter; ?>"><span class="sr-only">Like us on Twitter</span><span class="fa fa-twitter"></span></a></li>
                				<?php } ?>
                				<?php if (!empty($googleplus)) { ?>
                  				<li><a href="<?php echo $googleplus; ?>"><span class="sr-only">Like us on Google Plus</span><span class="fa fa-google-plus"></span></a></li>
                				<?php } ?>
                				<?php if (!empty($youtube)) { ?>
                  				<li><a href="<?php echo $youtube; ?>"><span class="sr-only">Like us on YouTube</span><span class="fa fa-youtube-play"></span></a></li>
                				<?php } ?>
                				<?php if (!empty($instagram)) { ?>
                  				<li><a href="<?php echo $instagram; ?>"><span class="sr-only">Like us on Instagram</span><span class="fa fa-instagram"></span></a></li>
                				<?php } ?>
                				<?php if (!empty($pinterest)) { ?>
                  				<li><a href="<?php echo $pinterest; ?>"><span class="sr-only">Like us on Pinterest</span><span class="fa fa-pinterest"></span></a></li>
                				<?php } ?>
                				<?php if (!empty($linkedin)) { ?>
                  				<li><a href="<?php echo $linkedin; ?>"><span class="sr-only">Connect with us on LinkedIn</span><span class="fa fa-linkedin"></span></a></li>
                				<?php } ?>
              				</ul>
                    <?php } ?>
        			</div><!-- END OF SPAN -->

        			<div class="col-md-7 col-xs-12 hidden-print hidden-md-down hidden-print">
          			<div class="row">

            			<div class="col-xs-6">
          					<?php include (get_template_directory(). '/library/includes/2.0.1/footer-ms-links.php'); ?>
            			</div><!-- END OF SPAN -->
            			<div class="col-xs-6">
            				<?php include (get_template_directory(). '/library/includes/2.0.1/footer-utp-links.php'); ?>
            			</div><!-- END OF SPAN -->

          			</div><!-- END OF ROW -->
        			</div><!-- END OF SPAN -->

      			</div><!-- END OF ROW -->
    			</div><!-- END OF SPAN -->

    			<?php if ( (is_active_sidebar( 'footer_one_id' )) || ( is_active_sidebar('footer_two_id' )) ) { ?>

    			<div class="<?php echo $col_footer2_span; ?> col-xs-12 hidden-md-down hidden-print">
      			<div class="row">

              <?php if ( is_active_sidebar( 'footer_one_id' )) { ?>
                <div class="<?php echo $col_span; ?>">
    							<?php dynamic_sidebar( 'footer_one_id' ); ?>
                </div><!-- END QUICK LINKS 1 -->
              <?php } ?>
              <?php if (is_active_sidebar( 'footer_two_id' )) { ?>
                <div class="<?php echo $col_span; ?>">
    							<?php dynamic_sidebar( 'footer_two_id' ); ?>
                </div><!-- END QUICK LINKS 2 -->
              <?php } ?>
            <?php } ?>

      			</div><!-- END ROW -->
    			</div><!--END OF SPAN -->

    		</div><!-- END OF ROW -->
      </div><!-- END OF CONTAINER -->
      <?php include (get_template_directory(). '/library/includes/2.0.1/superfooter.php'); ?>
    </footer>

    <?php wp_footer(); ?>
      <?php
          $inject = get_option( 'theme_inject_footer' );
          if (!empty($inject)) { echo $inject; }
      ?>
    <script src="https://use.typekit.net/kfh4zdi.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

  </body>
</html>