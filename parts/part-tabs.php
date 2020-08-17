              <?php 
                $cf = get_post_custom($post->ID);
                // echo '<pre>' . print_r($cf) . '</pre>';
                $count = 0;
                
              if ( $post->post_content !="" ) {
                $mainbody = get_the_title();
          			$mainbody_str_replace = str_replace(array(' ' , ','), '-', $mainbody); 
          			$mainbody_str_replace = strtolower($mainbody_str_replace);
          			$mainbodyid = sanitize_title_with_dashes($mainbody_str_replace);
              ?>
        				<div id="panel-mainbody" class="tab-pane active" role="tabpanel" aria-labelledby="tab-mainbody">
          				<div class="main">
        						<?php the_content(); ?>
          				</div>
        				</div>
      				<?php }
          		if ( isset($cf['_facultypagev2div'][0]) ) { 
      					$facultylisting = unserialize($cf['_facultypagev2div'][0]);
      					if ($facultylisting[0]['_faculty'][0] !=0) { ?>
                	<div id="panel-faculty-section" class="tab-pane" role="tabpanel" aria-labelledby="tab-faculty-section">
            		    <?php get_template_part('parts/part', 'facultylisting'); ?>
                	</div>
    						<?php }
      				} ?>
  
                  <?php $sectionsunserialize = $cf['_tabs'][0];
              		$sections = unserialize($sectionsunserialize);
  
            	  	if (isset($sections[0]['__title'])) {
  
                		foreach ($sections as $section) {
                      $count++;
                  		$title = $section[ '__title'];
                			$titleid = str_replace(array(' ', ','), '-', $title );
                			$titleid = strtolower($titleid);
                			$titleid = sanitize_title_with_dashes($titleid);
                			//$layout = ;
  
                    	
                    	if (!empty($title)) { ?>
              					<div id="panel-<?php echo $titleid; ?>" class="tab-pane" role="tabpanel" aria-labelledby="tab-<?php echo $titleid; ?>">
                					<h2><?php echo $title; ?></h2>
                      		<?php if (!empty($section[ '__content'])) { 
                        		$content = apply_filters('the_content', $section[ '__content']);
                        		echo $content;
                      		} else { ?>
                        		<p>Uh oh! <br /><br />Missing content. Please fill this area in!</p>
                        	<?php } ?>
              					</div>
              				<?php } // END IF TITLE IS NOT EMPTY ?>
                		<?php } // END FOREACH ?>
                  <?php } // END IF TITLE ISSET ?>
