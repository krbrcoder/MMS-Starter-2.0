		<?php
			$cf = get_post_custom($post->ID);
			$slideshow = unserialize($cf['_slider'][0]);
			$slidecount = count($slideshow);
			$count = 0;
		?>

		<?php //echo '<pre>'; print_r($slideshow); echo '</pre>'; ?>

			<div id="theme-slider" class="carousel slide bordered-section" data-ride="carousel">

				<?php if ($slidecount>1) : ?>
				<?php // Controls if There is more than 1 slide ?>
					<!-- commented out due to lack of accessibility
					<a class="left carousel-control" href="#theme-slider" data-slide="prev" role="button">
						<span class="fa fa-chevron-left"></span><span class="sr-only">View Previous Slide</span>
					</a>
					<a class="right carousel-control" href="#theme-slider" data-slide="next">
						<span class="fa fa-chevron-right"></span><span class="sr-only">View Next Slide</span>
					</a>
					-->
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<?php for ($x=0; $x<$slidecount; $x++) { ?>
						<li data-target="#theme-slider" data-slide-to="<?php echo $x; ?>" <?php if (($x+1) == 1){echo ' class="active"';}?>></li>
					<?php } ?>
					</ol>
				<?php endif; ?>

			  <!-- WRAPPER FOR SLIDES -->
			  <div class="carousel-inner">

			    <?php foreach($slideshow as $slideitem){
            $count ++; ?>
            <?php if (!empty($slideitem['_slide'])) { ?>
    			    <div class="carousel-item <?php if ($count == 1){ echo ' active';} ?>">
    				    <?php $slideimageid = $slideitem['_slide'];
    				    echo wp_get_attachment_image($slideimageid, 'cover'); ?>
    					<?php if(!empty($slideitem['_caption'])) {?>
    						<div class="carousel-caption">
    					    <?php echo apply_filters( 'the_content', $slideitem['_caption'] ); ?>
    					  </div>
    					<?php } // IF CAPTION IS NOT EMPTY ?>
    				  </div>
            <?Php } ?>
  			  <?php } // END FOREACH ?>

			  </div>
			  <!-- END WRAPPER FOR SLIDES -->

		</div><!-- END OF CONTAINER -->