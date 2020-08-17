		<?php
			$cf = get_post_custom($post->ID);

			$video = $cf['_video_embed'][0];

			$source_select = $cf['_video_source'][0];

			if ( $source_select == 'youtube' ) {
  			$source = 'https://www.youtube.com/embed/' . $video . '?showinfo=0&autoplay=1&loop=1&playlist=' . $video .'&rel=0&amp;showinfo=0&autohide=1&controls=0';
			} elseif ( $source_select == 'vimeo' ) {
  			$source = 'https://player.vimeo.com/video/' . $video . '?autoplay=1&loop=1';
			} else {
  			$source = $video;
			}
		?>

          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $source; ?>" title="Main video for this page"></iframe>
          </div>