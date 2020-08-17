      			<div id="right-sidebar" class="col-md-3 hidden-print col-sm-12 col-xs-12" role="navigation" aria-label="right-sidebar">
              <?php $cf = get_post_custom($post->ID);
                $pageid = $post->ID;

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
          	      ?>
          		        <?php if ( $newsquery->have_posts() ) :?>
              		    	<div class="single-post-meta" id="related-news">
              	    		<span class="h6 section-header">Related News</span>
                				<ul class="nav secondarynav related-external">
              				    <?php while ( $newsquery->have_posts() ) : $newsquery->the_post(); ?>
                            <li><a target="_self" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                          <?php endwhile; ?>
                        </ul>
              		    	</div>
                      <?php endif;
            				wp_reset_query();

              if (isset($cf['_additional_page'][0])) {
              	$relatedpage_data = unserialize($cf['_additional_page'][0]);
              	$firstrelatedpagelink = $relatedpage_data[0];	// if this = 0, assume no related page is selected
            	}

            	if (isset($cf['_non_internal'][0])) {
              	$external = unserialize($cf['_non_internal'][0]);
              }

              if ( ($firstrelatedpagelink != 0)  || (!empty($external)) ) { ?>
              	<?php /******************* RELATED PAGES SECTION *******************/

            		if (!empty($firstrelatedpagelink)) {
              		if ($firstrelatedpagelink != 0) { ?>
          		    	<div class="single-post-meta" id="related-internal-pages">
            	    		<span class="h6 section-header">Related Pages</span>
                      <ul class="nav secondarynav related-external">
                			<?php foreach ($relatedpage_data as $relatedpageid) { ?>
                				<li><a href="<?php echo get_permalink($relatedpageid); ?>"> <?php echo get_the_title($relatedpageid); ?></a></li>
                			<?php } ?>
                      </ul>
          		    	</div>
              		<?php } ?>
            		<?php } ?>


              	<?php /******************* ADDITIONAL LINKS SECTIONS *******************/
              	if (!empty($external)) {
              		$firstexternallink = $external[0]['_title'];
              		if (!empty($firstexternallink)) { ?>
          		    	<div class="single-post-meta" id="additional-links">
            	    		<span class="h6 section-header">Additional Links</span>
                      <ul class="nav secondarynav related-external">
                			<?php foreach($external as $externalitem) { ?>
                				<li><a href="<?php echo $externalitem['_url']; ?>" target="_blank"><?php echo $externalitem['_title']; ?></a></li>
                			<?php } ?>
                      </ul>
          		    	</div>
              		<?php } ?>
            		<?php } ?>
          		<?php } ?>

              	<?php /******************* ADDITIONAL LINKS SECTIONS *******************/
                	if (isset($cf['_pg_settings_r_label'][0])) {
                  	$r_label = $cf['_pg_settings_r_label'][0];
              		}
              		if (isset($cf['_pg_settings_r_content'][0])) {
                		$r_content = apply_filters( 'the_content', $cf['_pg_settings_r_content'][0]);
                  }

                  if ( (!empty($r_label)) || (!empty($r_content)) ) { ?>
          		    	<div class="single-post-meta" id="additional-area">
            	    		<?php if (!empty($r_label)) { ?><span class="h6 section-header"><?php echo $r_label; ?></span><?php } ?>
                      <?php if (!empty($r_content)) {	echo $r_content; } ?>
            		    </div>
                  <?php } ?>
      			</div>