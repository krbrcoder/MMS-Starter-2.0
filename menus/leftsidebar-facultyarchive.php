    			<div id="left-sidebar" class="col-md-3 hidden-print hidden-sm-down" role="navigation" aria-label="left-sidebar">
              <ul class="nav secondarynav internal">
              	<?php $cf = get_post_custom($post->ID);

              	if (isset($cf['_facultypagev2div'][0])) {
              		$facultylisting = unserialize($cf['_facultypagev2div'][0]);
              		// echo $facultylisting;

              		foreach ($facultylisting as $facultyset) {
              			// echo $facultyset;

              			$label = $facultyset['_label'];
              			$label_str_replace = str_replace(array(' ' , ','), '-', $label);
              			$label_str_replace = strtolower($label_str_replace);
              			$label_id = sanitize_title_with_dashes($label_str_replace);

              			?>
                		<?php if (!empty($label)) { ?>
                  		<li class="nav-item menu-item"><a href="#<?php echo $label_id; ?>"><?php echo $label; ?></a></li>
                		<?php } ?>
              		<?php } ?>
              	<?php } ?>
              </ul>
                <?php if(has_nav_menu('menu-3')) { ?>
                <hr class="spacer">

                <ul class="nav secondarynav external">

                    <?php wp_nav_menu( array(

                        'theme_location'    => 'menu-3',
                        'depth'             => 4,
                        'container'         => false,
                        'menu_id'           => 'menu3',
                        'menu_class'        => 'nav')
                   ); ?>

                </ul>

              <?php } ?>
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

<?php
						$children = wp_list_pages('depth=1&title_li=&child_of='.$pageid.'&echo=0');
						$current_page = wp_list_pages('title_li=&include='.$pageid.'&echo=0');
						$parent = wp_list_pages('title_li=&include='.$post->post_parent.'&echo=0');
						$parent_children = wp_list_pages('depth=1&title_li=&child_of='.$post->post_parent.'&echo=0');
						$parent_post = get_post($post->post_parent);
						$parenttitle = get_the_title($post->post_parent);
						$parentlink = get_permalink($post->post_parent);
						$grandparent = $parent_post->post_parent;
						$grandparenttitle = get_the_title($parent_post->post_parent);
						$grandparentlink = get_permalink($parent_post->post_parent); ?>
					<div id="parent-child">
						<?php if(!$post->post_parent && $children) { ?>
            <span class="h6 section-header hidden-md-down"><a href="<?php echo get_permalink($pageid); ?>"><?php echo get_the_title($pageid);?></a></span>

  					<ul class="sidebar_menu">
  						<?php echo $children;?>
  					</ul>
  					<?php } ?>

  					<?php if($post->post_parent && $children) { ?>

              <span class="h6 section-header hidden-md-down"><a>Inside <?php echo get_the_title($pageid);?></a></span>
  						<ul class="nav secondarynav internal">
  							<?php echo $current_page;?>
  								<ul class="sidebar_menu children">
  									<?php echo $children;?>
  								</ul>
  						</ul>
  					<?php } ?>

  					<?php if($grandparent && $post->post_parent && !$children) { ?>
              <span class="h6 section-header hidden-md-down"><a href="<?php echo $parentlink; ?>">Inside <?php echo $parenttitle; ?></a></span>

  						<ul class="sidebar_menu">
  							<?php echo $parent;?>
  							<ul class="sidebar_menu children">
  								<?php echo $parent_children;?>
  							</ul>
  						</ul>
  					<?php } ?>

  					<?php if(!$grandparent && $post->post_parent && !$children) { ?>
              <span class="h6 section-header hidden-md-down"><a href="<?php echo $grandparentlink; ?>">Inside <?php echo $grandparenttitle; ?></a></span>

  						<ul class="sidebar_menu">
  							<?php echo $parent_children;?>
  						</ul>
  					<?php } ?>
        		</div>
      			</div>