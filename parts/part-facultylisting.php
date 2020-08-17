  			<?php /* FACULTY SECTION */	?>
				<?php $cf = get_post_custom($post->ID);
    		$template_uri = get_template_directory_uri();

				if (isset($cf['_facultypagev2div'][0])) {
					$facultylisting = unserialize($cf['_facultypagev2div'][0]);

					if (isset($cf[ '_facultypageoptions_rows'][0])) {
  					$rows = $cf[ '_facultypageoptions_rows'][0];
  					if ( $rows == 'count3' ) {
    					$rowcount = 'col-3';
  					} else if ( $rows == 'count4' ) {
    					$rowcount = 'col-4';
    				} else {
      				$rowcount = 'col-2';
    				}
    		  } else {
    					$rowcount = 'col-2';
    		  }
					// print_r($facultylisting);

					foreach ($facultylisting as $facultyset) {

						$label = $facultyset['_label'];
						$label_str_replace = str_replace(array(' ' , ','), '-', $label);
						$label_str_replace = strtolower($label_str_replace);
						$label_id = sanitize_title_with_dashes($label_str_replace);
						$faculty = $facultyset['_faculty'];

  					?>
          		<?php if (!empty($label)) { ?>
        				<div class="col-md-12">
              		<h2 id="<?php echo $label_id; ?>"><?php echo $label; ?></h2>
        				</div>
              <?php } ?>
      				<div class="col-md-12 facultylisting">
      					<ul>
									<?php	foreach ($faculty as $facultyid){

										$facultycf = get_post_custom($facultyid);

										if ( !empty($facultyid) ) {

        							if (isset($facultycf['_info_fname'][0])){
        								$fname = $facultycf['_info_fname'][0];
        							}
        							if (isset($facultycf['_info_mname'][0])){
        								$middleName = $facultycf['_info_mname'][0];
          							if (!empty($middleName)){ // Put this to avoid the dot when there is no middle name
          						    $mname =  substr($middleName, 0, 1) . '. '; //adding a period and space after mname after shortening it to 1 character
      					        } else {
      						        $mname = $middleName;
      					        }
        							}
        							if (isset($cf['_info_lname'][0])){
        								$lname = $facultycf['_info_lname'][0];
        							}

        							if ( isset($mname) && isset($lname) ) {
        								$theName = $fname . ' ' . $mname .  ' ' . $lname;
        							} else {
        								$theName = get_the_title($facultyid);
        							}
        							if (isset($facultycf['_info_faculty_degrees'][0])){
        								$degrees = $facultycf['_info_faculty_degrees'][0];
        							}
        							if (isset($facultycf['_title'][0])){
        								$title = unserialize($facultycf['_title'][0]);
        								$firstitle = $title[0]['_title'];
        							}
                	    if ( has_post_thumbnail($facultyid) ) {
                  	    $thumbnail_uri = wp_get_attachment_image_src(get_post_thumbnail_id($facultyid));
                  	    $thumburl = $thumbnail_uri[0];
                	      $postthumbnail = get_the_post_thumbnail($facultyid, 'faculty-profile');
                	    } else {
                		  $postthumbnail = '<img class="attachment-faculty-profile-listing size-faculty-profile-listing wp-post-image img-fluid" src="' . $template_uri . '/library/includes/2.0.1/images/faculty-full.jpg" alt="No Image available" width="100" height="125" />';
                      } ?>

  							<li class="facultylist-item <?php echo $rowcount; ?>"<?php /* data-sr="enter left please, and hustle 20px" */ ?>>
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
			  								<span><?php echo $titleitem['_title']; ?></span><?php if ($titleitem !== end($title)) { echo ',';} ?>
			  							<?php } ?>
									  </span>
	  		    			<?php } // END IF FIRST TITLE EXISTS ?>
  								</div>
  							</li>
    								<?php } // END IF FACULTYID NOT EMPTY ?>
    							<?php } // END FOREACH FACULTY ?>
      					</ul>
      	    	</div><!-- END FACULTYLISTING COLSPAN -->
					<?php } // END FOREACH FACULTY SET ?>
				<?php } // END IF FACULTYPAGE2DIV ISSET ?>
            <?Php /*<script>
              window.sr = new scrollReveal();
            </script>*/ ?>
