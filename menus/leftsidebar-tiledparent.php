      			<div id="left-sidebar" role="navigation" class="col-md-3 hidden-print col-sm-12 col-xs-12" aria-label="left-sidebar">
              <?php
                $cf = get_post_custom($post->ID);
              	$pageid = $post->ID;

                	if (isset($cf['_sections'][0])) {
                  	$section = unserialize($cf['_sections'][0]);
                  	$firstsection = $section[0]['_title'];
                  }

                  /******************* PAGE SECTIONS *******************/
                  if ( !empty($firstsection)) { ?>

                		<span class="h6 section-header hidden-md-down"><a>In this Page</a></span>
                    <ul class="nav secondarynav internal">
                  		<li class="hidden-md-down"><a href="#top">Top of Page</a></li>

                    	<?php	foreach($section as $item) {
                  			$sectiondashed = str_replace(' ', '-', $item['_title']);
                  			$finalsection = strtolower($sectiondashed); ?>
                  			<li class="children"><a href="#<?php echo sanitize_title_with_dashes($finalsection);?>" title="<?php echo $item['_title']; ?> under <?php echo get_the_title(); ?>"><?php echo $item['_title']; ?></a></li>
                    	<?php } ?>
                    <hr class="spacer">
                    </ul>
                  <?php } ?>
      			</div>