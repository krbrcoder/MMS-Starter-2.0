      			<div id="left-sidebar" class="col-md-3 hidden-print" role="navigation" aria-label="left-sidebar">
              <div class="single-post-meta" id="tabbedlist">
  						<?php
            		$cf = get_post_custom($post->ID);
            		//print_r($cf);
            		$count = 0;

                $mainbody = get_the_title();
          			$mainbody_str_replace = str_replace(array(' ' , ','), '', $mainbody);
          			$mainbody_str_replace = strtolower($mainbody_str_replace);
          			$mainbodyid = sanitize_title_with_dashes($mainbody_str_replace);
            		?>

                  <span class="h6 section-header hidden-md-down">Inside <?php echo $mainbody; ?></span>
                  <ul class="nav secondarynav sub-menu tabbed-menu" role="tablist" aria-labelledby="tabbedlist">
                    <?php if ( $post->post_content !="" ) {
                    ?>
                      <li class="nav-item menu-item"><a href="#panel-mainbody" data-toggle="tab" role="tab" class="active" id="tab-mainbody"><?php echo $mainbody; ?> Overview</a></li>
                    <?php }
                    if ( isset($cf['_facultypagev2div'][0]) ) {
            					$facultylisting = unserialize($cf['_facultypagev2div'][0]);
            					if ($facultylisting[0]['_faculty'][0] !=0) { ?>
                          <li class="nav-item menu-item"><a href="#panel-faculty-section" data-toggle="tab" role="tab" id="tab-faculty-section"><?php echo $mainbody; ?> Faculty</a></li>
          						<?php }
            				} ?>

            	  		<?php $sections = unserialize($cf['_tabs'][0]);

              	  	if (isset($sections[0]['__title'])) {

                	  	foreach($sections as $section) {
                    		$count++;
                				$layout = $section['__layout'];
                				if ($layout == 'layout1') {
                  				$tabclass = 'tab-parent';
                				} if ($layout == 'layout2') {
                  				$tabclass = 'tabbed-child';
                				} if ($layout == 'layout3') {
                  				$tabclass = 'tabbed-child-child';
                				}
                        $title = $section['__title'];
                  			$titleid_str_replace = str_replace(array(' ' , ','), '-', $title);
                  			$titleid_str_replace = strtolower($titleid_str_replace);
                  			$titleid = sanitize_title_with_dashes($titleid_str_replace);

                  			if (!empty($title)) { ?>
                          <li class="<?php echo $tabclass; ?> nav-item menu-item"><a href="#panel-<?php echo $titleid;?>" data-toggle="tab" role="tab" id="tab-<?php echo $titleid;?>"><?php echo $title; ?></a></li>
                        <?php } else { ?>
                          <li class="<?php echo $tabclass; ?> disabled menu-item"><a href="#" class="disabled" data-toggle="tab" role="tab" id="tab-missing-title">Missing Title</a></li>
                        <?php } // END IF TITLE IS NOT EMPTY ?>
                      <?php } // END FOREACH ?>
                    <?php } // END IF TITLE ISSET ?>
                  </ul>
              </div>
          		<?php
                $parentID = get_post_top_ancestor_id($post);
                //Function to get the parent-post(page) id is added in the functions.php file.

          			if ( $post->post_parent ) {
            			$title = get_the_title($parentID);
            			$link = get_permalink($parentID);
            			$children = wp_list_pages("title_li=&child_of=".$parentID."&echo=0&sort_order=ASC");

            			$thistitle = get_the_title($post->ID); // This is for loading faculty page specific templates
          			} else {
            			$title = get_the_title($parentID);
            			$link = get_permalink($parentID);
            			$children = wp_list_pages("title_li=&child_of=".$parentID."&echo=0&sort_order=ASC");
          			}
          		?>

          		<?php if ($title) { ?>
          		<?php } ?>
          				<?php
          				if ($children) { ?>
                		<div id="parent-child">
                			<span class="h6 section-header"><a href="<?php echo $link; ?>" aria-labelledby="parent-child">Inside <?php echo $title; ?></a></span>
                			<ul class="secondarynav" role="tablist" aria-labelledby="parent-child">
                  			<?php echo $children; ?>
                			</ul>
                		</div>
          				<?php } else {} ?>
      			</div><!-- END OF LEFT -->