	<?php
		$postID = get_the_ID();
		$get_postTitle = get_the_title();
		$postTitle = str_replace(array(', ',' '), '%20', $get_postTitle);
		$get_postlink = get_permalink();
		$postlink = str_replace(':', '%3A', $get_postlink);
		$cf = get_post_custom($postID);

    $twitterexists = get_option( 'theme_twitter' );
    if (!empty($twitterexists)) {
      $twitter = $twitterexists;
    } else {
      $twitter = 'McGovernMed';
    }
		?>

    <div class="single-post-meta" id="post-date">
      <span class="h6 section-header"><span class="fa fa-clock-o"></span> Posted on</span>
      <p><?php echo the_date('F d, Y'); ?></p>
    </div>
      <hr class="spacer">
    <?php $posttags = get_the_tags();
      if ($posttags) { ?>
      <div class="single-post-meta" id="post-tags">
          <h3 class="h5 section-header"><span class="fa fa-tags"></span> Tags</h3>
          <?php foreach($posttags as $tag) { ?>
            <a href="<?php echo get_tag_link($tag->term_id); ?>" class="post-tag"><?php echo $tag->name; ?></a>
          <?php } ?>
      </div>
      <hr class="spacer">
      <?php } ?>
      <div class="single-post-meta" id="social-share">
        <h3 class="h6 section-header">Share</h3>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postlink; ?>" title="Share on Facebook" target="_blank"><span class="icon fa fa-facebook"></span><span class="sr-only"> Share on Facebook</span></a>
          <a href="https://twitter.com/home?status=<?php echo $postTitle; ?>%20%40<?php echo $twitter; ?>%20<?php echo $postlink; ?>" title="Share on Twitter"><span class="icon fa fa-twitter" target="_blank"></span><span class="sr-only"> Share on Twitter</span></a>
          <a href="https://plus.google.com/share?url=<?php echo $postlink; ?>" title="Share on Google" target="_blank"><span class="icon fa fa-google"></span><span class="sr-only"> Share on Google Plus</span></a>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $postlink; ?>&title=<?php echo $postTitle; ?>&summary=&source=" title="Share on LinkedIn"><span class="icon fa fa-linkedin" target="_blank"></span><span class="sr-only"> Share on Google Plus</span></a>
          <a href="mailto:?&subject=<?php echo $postTitle; ?>&body=Here%20is%20an%20article%20on%20<?php echo $postTitle; ?>%0A<?php echo $postlink; ?>" title="Share by Email" target="_blank"><span class="icon fa fa-envelope"></span><span class="sr-only"> Share by Email</span></a>
      </div>


		<?php // RELATED PROVIDERS

    if ( isset($cf['_faculty_faculty'][0]) ) {

    	$facultymembers = unserialize($cf['_faculty_faculty'][0]);
    	if ($facultymembers[0] > 0 ) { ?>
        <div class="single-post-meta" id="faculty-in-post">
      		<span class="h6 section-header">In this article</span>
          <?php foreach ( $facultymembers as $faculty ) {
      			 // echo '<pre>';print_r($faculty); echo '</pre>';

      			$facultylink = get_the_permalink($faculty);
      			$facultyname = get_the_title($faculty);
      			$facultythumb = get_the_post_thumbnail( $faculty, 'faculty-profile-listing' );
      			?>

      			<div class="faculty-thumb"><a title ="View detailed profile of <?php echo $facultyname; ?>" href="<?php echo $facultylink; ?>"><?php echo $facultythumb; ?></a></div>
      		<?php } ?>
        </div>
    	<?php } ?>
  	<?php } ?>