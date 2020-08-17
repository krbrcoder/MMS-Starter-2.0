	<?php
		$postID = get_the_ID();
		$postTitle = get_the_title();
		$cf = get_post_custom($postID); ?>

		<?php // RELATED PAGES

    if ( isset($cf['_page_select'][0]) ) {
    	$pageselects = unserialize($cf['_page_select'][0]);
    	if ($pageselects[0] > 0 ) { ?>

      		<span id="related-pages" class="h6 section-header">Related Pages</span>
          <ul class="left-nav-list utp-nav-list list-unstyled">

          <?php foreach ( $pageselects as $pageselect ) {
      			 // echo '<pre>';print_r($pageselect); echo '</pre>';

            $pageselectname = get_the_title($pageselect);
            $pageselectlink = get_the_permalink($pageselect);
      			?>

      			<li><a title ="View detailed <?php echo $pageselectname; ?>" href="<?php echo $pageselectlink; ?>" ><?php echo $pageselectname; ?></a></li>
      		<?php } ?>
      		</ul>
    	<?php } ?>
  	<?php } ?>