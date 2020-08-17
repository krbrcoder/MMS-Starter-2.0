          <div class="single-post-meta" id="tabbedlist" aria-label="tabbedlist" role="navigation">
          	<?php $pageid = $post->ID;
          		$cf = get_post_custom($post->ID);
          		//print_r($cf);
          		$count = 0;

            	$section = unserialize($cf['_sections'][0]);
            	$firstsection = $section[0]['_title'];
            ?>
                <span class="h6 section-header hidden-md-down">Inside <?php echo $mainbody; ?></span>
                <ul class="nav secondarynav sub-menu tabbed-menu" id="tablist" role="tablist" aria-label="tablist">
                  <?php if ( $post->post_content !="" ) { ?>
                    <li class="nav-item menu-item"><a href="#panel-mainbody" data-toggle="tab" role="tab" class="active" id="tab-mainbody">Overview</a></li>
                  <?php }
                  if ( isset($cf['_facultypagev2div'][0]) ) {
          					$facultylisting = unserialize($cf['_facultypagev2div'][0]);
          					if ($facultylisting[0]['_faculty'][0] !=0) { ?>
                        <li class="nav-item menu-item"><a href="#panel-faculty-section" data-toggle="tab" role="tab" id="tab-faculty-section">Faculty</a></li>
        						<?php }
          				} ?>

      	<?php	foreach($section as $item) {
    			$sectiondashed = str_replace(' ', '-', $item['_title']);
    			$finalsection = strtolower($sectiondashed); ?>
    			<li class="nav-item menu-item"><a href="#panel-<?php echo sanitize_title_with_dashes($finalsection);?>" title="<?php echo $item['_title']; ?> under <?php echo get_the_title(); ?>"><?php echo $item['_title']; ?></a></li>
      	<?php } ?>
      <hr class="spacer">
      </ul>

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