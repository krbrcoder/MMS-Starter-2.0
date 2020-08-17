        	<?php
          	$pageid = get_the_ID();
        		$args = array(
        			'post_type' => 'faculty',
        			'posts_per_page' => -1,
        			'order'		=> 'ASC',
        			'orderby'	=> 'meta_value',
        			'meta_key'	=> '_info_lname'
        			);
        		$loop = new WP_Query( $args );
        	?>
        	<ul id="facultylisting">

        	<?php if ( $loop->have_posts() ) : ?>
  					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

  						<?php
    						$cf = get_post_custom();
    						//echo $cf;
    						$facultyid = $post->ID;
  							$facultycf = get_post_custom($facultyid);
            		$template_uri = get_template_directory_uri();

  							if (isset($facultycf['_info_faculty_degrees'][0])){
  								$degrees = $facultycf['_info_faculty_degrees'][0];
  							}
  							if (isset($facultycf['_title'][0])){
  								$title = unserialize($facultycf['_title'][0]);
  								$firstitle = $title[0]['_title'];
  							}
          	    if ( has_post_thumbnail($facultyid) && !is_wp_error(has_post_thumbnail($facultyid)) ) {
            	    $thumbnail_uri = wp_get_attachment_image_src(get_post_thumbnail_id($facultyid));
            	    $thumburl = $thumbnail_uri[0];
          	      $postthumbnail = get_the_post_thumbnail($facultyid,'faculty-profile');
          	    } else {
          		  $postthumbnail = '<img class="attachment-faculty-profile-listing size-faculty-profile-listing wp-post-image img-fluid" src="' . $template_uri . '/library/includes/2.0.1/images/faculty-full.jpg" alt="No Image available" width="100" height="125" />';
          		  }
      		  		if (isset($facultycf['_specialties_items'][0])) {
              		$specialties = unserialize($cf['_specialties_items'][0]);
              		$firstspecialty = $specialties[0];
            		} ?>

  							<li class="facultylist-item col-2">
  								<div class="fl-thumbnail">
    								<a href="<?php echo get_permalink($facultyid); ?>" title="Visit the profile page of <?php echo get_the_title($facultyid); ?>">
      									<?php echo $postthumbnail; ?>
    								</a>
  								</div><!-- END .fl-thumbnail -->
  								<div class="fl-info">
  								<a href="<?php echo get_permalink($facultyid); ?>" title="Visit the profile page of <?php echo get_the_title($facultyid); ?>">
    								<p><strong><?php echo get_the_title($facultyid); ?></strong></p>
  								</a>
									<?php if (!empty($firstitle)) { ?>
									  <span class="hidden-xs hidden-sm faculty-member-list-item">
			  							<?php foreach($title as $titleitem) { ?>
			  								<span><?php echo $titleitem['_title']; ?><?php if (!empty($titleitem['_name'])){ echo ', ' . $titleitem['_name']; }?></span><?php if ($titleitem !== end($title)) { echo ',';} ?>
			  							<?php } ?>
									  </span>
	  		    			<?php } // END IF FIRST TITLE EXISTS ?>
    		    			<?php if (!empty($firstspecialty)) { ?>
    		    			  <span class="specialties faculty-member-list-item">
    		    			  <span>Specialties:</span>
      		    			<?php foreach ($specialties as $specialty) { ?>
        		    	    <span><?php echo $specialty; ?></span><?php if ($specialty !== end($specialties)) { echo ',';} ?>
      		    			<?php } ?>
    		    			  </span>
    		    			<?php } ?>
  								</div>
  							</li>
  					<?php endwhile; ?>

  					<?php else: ?>
    					<li><h2>No Faculty Profiles to show!</h2></li>
					<?php endif; ?>
        	</ul>