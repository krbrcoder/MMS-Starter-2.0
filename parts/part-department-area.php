      <div id="calendar-news-section" aria-labelledby="calendar-news-section">
        <div class="container">
          <div class="row">

            <?php $cf = get_post_custom($post->ID);
              if ( ($cf[ '_homepage_showcal' ][0]) == 'yes' ) { ?>
                  
              <?php get_template_part('parts/part','calendar'); ?>

              <div class="col-md-7 col-md-offset-1 col-sm-7">
                <div class="row">
      
                  <?php if (($cf[ '_homepage_shownews' ][0]) == 'yes' ) { ?>
                    <div id="news" class="col-md-12">
                    <?php get_template_part('parts/part','news'); ?>
                    </div>
                  <?php } ?>

                  <hr />
    
                  <div id="department-area" class="col-md-12">
                    <?php get_template_part('parts/part', 'msg'); ?>
                  </div>
                </div>
              </div>
            <?php } // END IF CALENDAR PRESENT
            else { ?>
              <?php if (($cf[ '_homepage_shownews' ][0]) == 'yes' ) { ?>
                <div id="news" class="col-md-6">
                <?php get_template_part('parts/part','news'); ?>
                </div>
              <?php } // END IF DEANMSG IS PRESENT + NEWS IS PRESENT 
              if (!empty($cf[ '_homepage_deanmsg' ][0] { ?>
                <div id="department-area" class="col-md-6">
                <?php get_template_part('parts/part', 'msg'); ?>
                </div>
              <?php } // END ELSE IF NEWS IS NOT PRESENT ?>
            <?php } // END ELSE IF CALENDAR NOT PRESENT ?>

          </div><!-- END OF ROW -->
        </div><!-- END OF CONTAINER -->
      </div>
