<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>

  <?php if ( ! post_password_required()) { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
			$cf = get_post_custom($post->ID);
			// echo '<pre>'; print_r($cf); echo '</pre>' ;

			$serviceID = get_the_ID();
			$servicecf = get_post_custom($serviceID);

			if ( isset( $servicecf['_service_menu_service_exists'][0] ) ){
				$serviceexists = $servicecf['_service_menu_service_exists'][0];
			}

    	?>

			<?php if (isset($cf['_video_embed'][0])) {
  				$video = $cf['_video_embed'][0];
  				$slideshow = unserialize($cf['_slider'][0]);
  				if (isset($cf['_homepage_width'][0])) {
  					if ($cf['_homepage_width'][0] == 'regular') {
    					$containerwidth = 'container';
  					} else {
    					$containerwidth = 'container-flex';
  					}
          } else {
            $containerwidth = 'container';
          }
				if (isset($cf['_homepage_bgcolor'][0])) {
					//$sliderbg = $cf['_homepage_bgcolor'][0];
        		}
  			}

  			if (!empty($video)) { ?>
      		<div class="<?php echo $containerwidth; ?>">
  					<?php get_template_part('parts/part', 'video');	?>
      		</div>
				<?php } elseif (!empty($slideshow)) { ?>
    		<div class="container-flex top-of-page" role="banner" aria-label="slideshow-banner" id="slideshow-banner" <?php if (!empty($sliderbg)) { echo 'style="background-color: ' . $sliderbg . '"'; } ?>>
      		<div class="<?php echo $containerwidth; ?>">
  	  			<?php get_template_part('parts/part', 'slider'); ?>
      		</div>
				</div><!-- END OF CONTAINER -->
			<?php } else {} ?>

  	<?php if ( (!empty($cf[ '_homepage_title01' ][0])) || (!empty($cf['_homepage_banner_body'][0])) ) {
    	get_template_part('parts/part', 'homepage');
    } ?>

  		<div id="main" role="main" aria-label="main" class="container aligncenter homecontent<?php if ( $serviceexists == 'yes' ) { echo ' services-content'; }?><?php if (!empty($slideitem['_slide'])) { echo ' padding'; } else {} ?>">
        <?php if ( $post->post_content !="" ) { ?>
      		<div class="row">
        		<div id="page-content" class="col-md-10 col-md-offset-1" aria-label="page-content main">
          		<?php the_content(); ?>
              <?php edit_post_link('Edit this entry.', '<span class="editentry">', '</span>'); ?>
        		</div>
      		</div>
    		<?php } ?>
  		</div>

    <?php
      if ( ($cf[ '_homepage_showcal' ][0]) == 'yes' ) {
        $calendar = 1;
      }
      if ( ($cf[ '_homepage_shownews' ][0]) == 'yes' ) {
        $news = 1;
      }
      if(isset($cf[ '_homepage_deanmsg' ][0])) {
        if ($cf[ '_homepage_deanmsg' ][0] >= 1 ) {
          $deanmsg = $cf[ '_homepage_deanmsg' ][0];
        }
      }
      if (isset($cf['_homepage_hp_schedulenow'][0])) {
        $threecol = $cf['_homepage_hp_schedulenow'][0];
      }
      if (isset($cf[ '_homepage_col3_show' ][0])) {
        if ($cf[ '_homepage_col3_show' ][0] == 'yes' ) {
            $threecol = $cf[ '_homepage_col3_show' ][0];
        }
      }

      if ( (empty($news)) && (empty($deanmsg)) ) {
        $column = 'col-md-6 col-sm-12 col-xs-12';
      } elseif ( (empty($deanmsg)) && (empty($threecol)) ) {
        $column = 'col-md-6 col-sm-12 col-xs-12';
      } elseif ( (empty($calendar)) && (empty($deanmsg)) ) {
        $column = 'col-md-6 col-sm-12 col-xs-12';
      }else {
        $column = 'col-md-4 col-sm-12 col-xs-12';
      }
      if ( !empty($calendar) || !empty($news) || !empty($deanmsg) || !empty($threecol) ) { ?>
      <div id="calendar-news-section" aria-label="calendar-news-section" role="complementary">
        <div class="container">
          <div class="row">

            <?php if ( (!empty($calendar)) ) { ?>
                  <div id="calendar" class="<?php echo $column; ?>" aria-label="calendar calendar-news-section">
                    <?php get_template_part('parts/part','calendar'); ?>
                  </div>

                  <?php if (!empty($threecol)) { ?>
                    <?php if ( (!empty($news)) && (!empty($deanmsg)) ) { ?>
                    <?php /* IF NEWS AND MSG ARE PRESENT */ ?>
                      <div class="col-md-4 col-xs-6">
                        <div class="row">
                          <div id="news" class="col-md-12" aria-label="news calendar-news-section">
                            <?php get_template_part('parts/part','news'); ?>
                          </div>
                          <hr />
                          <div id="department-area" class="col-md-12" aria-label="department-area calendar-news-section">
                            <?php get_template_part('parts/part', 'msg'); ?>
                            <?php $deanmsg = ''; ?>
                          </div>
                      </div><!-- END ROW -->
                    </div><!-- END COLSPAN -->

                    <?php } // END IF NEWS + MSG ARE PRESENT

                    elseif ( (!empty($news)) && (empty($deanmsg)) ) { ?>
                      <div id="news" class="col-md-4" aria-label="news calendar-news-section">
                        <?php get_template_part('parts/part','news'); ?>
                      </div>
                    <?php } // END IF NEWS PRESENT

                    elseif ( (!empty($news)) && (!empty($deanmsg)) ) { ?>
                      <div id="department-area" class="col-md-4 col-xs-12" aria-label="department-area calendar-news-section">
                        <?php get_template_part('parts/part', 'msg'); ?>
                        <?php $deanmsg = ''; ?>
                      </div>
                    <?php } // END IF NEWS OR MSG ARE PRESENT ?>

                    <div id="thirdcol" class="<?php echo $column; ?>" aria-label="thirdcol calendar-news-section">
                      <?php get_template_part('parts/part', '3col'); ?>
                    </div>

                  <?php } // END IF 3-COLUMN + NEWS + MSG ARE PRESENT

                    elseif (!empty($news)) { ?>
                      <div id="news" class="<?php echo $column; ?>" aria-label="news calendar-news-section">
                        <?php get_template_part('parts/part','news'); ?>
                      </div>
                    <?php } // END IF NEWS PRESENT

                    if (!empty($deanmsg)) { ?>
                      <div id="department-area" class="col-md-4 col-xs-12" aria-label="department-area calendar-news-section">
                        <?php get_template_part('parts/part', 'msg'); ?>
                        <?php $deanmsg = ''; ?>
                      </div>
                    <?php } // END IF NEWS OR MSG ARE PRESENT ?>

            <?php } // END IF CALENDAR IS PRESENT

            elseif (!empty($threecol)) { ?>

                  <?php if ( (!empty($news)) && (!empty($deanmsg)) ) { ?>
                  <?php /* IF NEWS + MSG ARE PRESENT */ ?>
                    <div id="news" class="col-md-4 col-xs-6" aria-label="news calendar-news-section">
                      <?php get_template_part('parts/part','news'); ?>
                    </div>
                    <div id="department-area" class="col-md-4 col-xs-6" aria-label="department-area calendar-news-section">
                      <?php get_template_part('parts/part', 'msg'); ?>
                      <?php $deanmsg = ''; ?>
                    </div>

                  <?php } // END IF NEWS + MSG ARE PRESENT

                  elseif ( (!empty($news)) && (empty($deanmsg)) ) { ?>
                  <?php /* IF NEWS IS PRESENT BUT NOT MSG */ ?>
                    <div id="news" class="col-md-6 col-xs-12" aria-label="news calendar-news-section">
                      <?php get_template_part('parts/part','news'); ?>
                    </div>
                  <?php } // END IF NEWS PRESENT

                  elseif (!empty($deanmsg)) { ?>
                      <div id="department-area" class="col-md-6 col-xs-12" aria-label="department-area calendar-news-section">
                        <?php get_template_part('parts/part', 'msg'); ?>
                        <?php $deanmsg = ''; ?>
                      </div>
                  <?php } // END IF NEWS OR MSG ARE PRESENT ?>
                  <div id="thirdcol" class="<?php echo $column; ?>" aria-label="thirdcol calendar-news-section">
                    <?php get_template_part('parts/part', '3col'); ?>
                  </div>

            <?php } // END IF 3-COLUMN IS PRESENT

            elseif ( (!empty($news)) && (!empty($deanmsg)) ) { ?>

                  <?php /* IF NEWS + MSG ARE PRESENT */ ?>
                    <div id="news" class="col-md-6 col-xs-12" aria-label="news calendar-news-section">
                      <?php get_template_part('parts/part','news'); ?>
                    </div>
                    <div id="department-area" class="col-md-6 col-xs-12" aria-label="department-area calendar-news-section">
                      <?php get_template_part('parts/part', 'msg'); ?>
                      <?php $deanmsg = ''; ?>
                    </div>
            <?php } // END IF NEWS + MSG ARE PRESENT

            elseif ( (!empty($news)) && (empty($deanmsg)) ) { ?>

                  <?php /* IF NEWS IS PRESENT BUT NOT MSG */ ?>
                    <div id="news" class="col-md-12" aria-label="news calendar-news-section">
                      <?php get_template_part('parts/part','news'); ?>
                    </div>
            <?php } // END IF NEWS PRESENT

            else { ?>
              <?php if (!empty($deanmsg)) { ?>
                <div id="department-area" class="col-md-12" aria-label="department-area calendar-news-section">
                  <?php get_template_part('parts/part', 'msg'); ?>
                </div>
                <?php } ?>
            <?php } // END IF NEWS AND/OR MSG ARE PRESENT ?>


          </div><!-- END ROW -->
        </div><!-- END OF CONTAINER -->
      <?php } // END IF CALENDAR + NEWS + MSG + 3COL PRESENT ?>
      </div>
    <?php
      $sections = unserialize($cf['_sections'][0]);
      if (!empty($sections[0]['_content'])) {
      get_template_part('parts/part', 'section' );
    } ?>


      <?php if (!empty($cf['_homepage_twitter_username'][0])) {
        get_template_part( 'parts/part', 'twitter' );
      } ?>


	<?php endwhile; endif; ?>


  <?php } else /* IF PASSWORD REQUIRED ELSE */ { ?>
    <?php get_template_part('parts/part', 'password'); ?>
  <?php } // END IF PASSWORD REQUIRED ?>


<?php get_footer(); ?>