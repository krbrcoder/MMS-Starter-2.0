<?php
      $cf = get_post_custom($post->ID);
      //print_r($cf);

      if(isset($cf[ '_homepage_label'][0])) {
        $homepagelabel = $cf[ '_homepage_label'][0];
      }
      if(isset($cf[ '_homepage_count'][0])) {
        $homepagecount = $cf[ '_homepage_count'][0];
      }
      if(isset($cf[ '_homepage_layout' ][0])) {
        $homepage_layout = $cf[ '_homepage_layout' ][0];
        if ( $homepage_layout == 'hplo2' ) {
          $moduleclass = 'light';
          $titlebefore = '<h2>';
          $titleafter = '</h2>';
        } else if ( $homepage_layout == 'hplo3' ) {
          $moduleclass = 'module-class-3';
          $titlebefore = '<div class="overlay"><h2>';
          $titleafter = '</h2></div>';
        } else {
          $moduleclass = 'dark';
          $titlebefore = '<h2>';
          $titleafter = '</h2>';
        }
      } else {
          $moduleclass = 'dark';
          $titlebefore = '<h2>';
          $titleafter = '</h2>';
      }

	if(isset($cf[ '_homepage_title01' ][0])) {
		$gettitle01 = $cf[ '_homepage_title01' ][0];
		$title01 = $titlebefore . $gettitle01 . $titleafter;
		if (!empty($title01)) {
			if(isset($cf[ '_homepage_link01' ][0])) {
				$link01 = $cf[ '_homepage_link01' ][0];
			}
			if(isset($cf[ '_homepage_alt01' ][0])) {
				$alt01 = $cf[ '_homepage_alt01' ][0];
			}
			if(isset($cf[ '_homepage_image01' ][0])) {
				$image01id = $cf[ '_homepage_image01' ][0];
				$image01 = wp_get_attachment_image($image01id, ' img-fluid');
			}
			if(!empty($cf[ '_homepage_textarea01' ][0])) {
				$textarea01 = apply_filters('the_content', $cf[ '_homepage_textarea01' ][0]);
			}
		}
	}

	if(isset($cf[ '_homepage_title02' ][0])) {
		$gettitle02 = $cf[ '_homepage_title02' ][0];
		$title02 = $titlebefore . $gettitle02 . $titleafter;
		if (!empty($title02)) {
			if(isset($cf[ '_homepage_link02' ][0])) {
				$link02 = $cf[ '_homepage_link02' ][0];
			}
			if(isset($cf[ '_homepage_alt02' ][0])) {
				$alt02 = $cf[ '_homepage_alt02' ][0];
			}
			if(isset($cf[ '_homepage_image02' ][0])) {
				$image02id = $cf[ '_homepage_image02' ][0];
				$image02 = wp_get_attachment_image($image02id, ' img-fluid');
			}
			if(!empty($cf[ '_homepage_textarea02' ][0])) {
				$textarea02 = apply_filters('the_content', $cf[ '_homepage_textarea02' ][0]);
			}
		}
	}

	if(isset($cf[ '_homepage_title03' ][0])) {
		$gettitle03 = $cf[ '_homepage_title03' ][0];
		$title03 = $titlebefore . $gettitle03 . $titleafter;
		if (!empty($title03)) {
			if(isset($cf[ '_homepage_link03' ][0])) {
				$link03 = $cf[ '_homepage_link03' ][0];
			}
			if(isset($cf[ '_homepage_alt03' ][0])) {
				$alt03 = $cf[ '_homepage_alt03' ][0];
			}
			if(isset($cf[ '_homepage_image03' ][0])) {
				$image03id = $cf[ '_homepage_image03' ][0];
				$image03 = wp_get_attachment_image($image03id, ' img-fluid');
			}
			if(!empty($cf[ '_homepage_textarea03' ][0])) {
				$textarea03 = apply_filters('the_content', $cf[ '_homepage_textarea03' ][0]);
			}
		}
	}

	if(isset($cf[ '_homepage_title04' ][0])) {
		$gettitle04 = $cf[ '_homepage_title04' ][0];
		$title04 = $titlebefore . $gettitle04 . $titleafter;
		if(!empty($title04)) {
			if(isset($cf[ '_homepage_link04' ][0])) {
				$link04 = $cf[ '_homepage_link04' ][0];
			}
			if(isset($cf[ '_homepage_alt04' ][0])) {
				$alt04 = $cf[ '_homepage_alt04' ][0];
			}
			if(isset($cf[ '_homepage_image04' ][0])) {
				$image04id = $cf[ '_homepage_image04' ][0];
				$image04 = wp_get_attachment_image($image04id, 'thumbnail img-fluid');
			}
			if(!empty($cf[ '_homepage_textarea04' ][0])) {
				$textarea04 = apply_filters('the_content', $cf[ '_homepage_textarea04' ][0]);
			}
		}
	}
    ?>

    <?php if(!empty($cf[ '_homepage_title01' ][0])) { ?>
		<!-- BEGIN SPECIAL SECTION -->
		<div id="module-page-section" aria-label="module-page-section" role="complementary" class="<?php echo $moduleclass; ?>">

			<div class="container">

				<?php if (!empty($homepagelabel)) { ?>
					<div class="col-md-12">
						<h1 style="padding-bottom: 50px;"><?php echo $homepagelabel; ?></a></h1>
					</div>
				<?php } ?>


  					<div class="cards-class">
    					<?php if (!empty($title01)) { ?>
							<!-- BEGIN SPECIAL 1 -->
							<div id="card-item-1" class="card-item" aria-label="card-item-1 module-page-section">
								<a href="<?php echo $link01; ?>" title="<?php echo $alt01; ?>">
									<?php if (!empty($image01id)) { ?>
										<div class="grayscale-img"><figure><?php echo $image01; ?></figure></div>
									<?php } else { ?>
										<p>There is no featured image for this module!</p>
									<?php } ?>
									<?php echo $title01; ?>
								</a>
								<?php if (!empty($textarea01)) { echo '<span class="description">' . $textarea01 . '</span>'; } ?>
							</div><!-- END #card-item-1 -->
							<!-- END OF SPECIAL 1 -->
							<?php } ?>

						<?php if (!empty($title02)) { ?>
							<!-- BEGIN SPECIAL 2 -->
							<div id="card-item-2" class="card-item" aria-label="card-item-2 module-page-section">
								<a href="<?php echo $link02; ?>" title="<?php echo $alt02; ?>">
									<?php if (!empty($image02id)) { ?>
										<div class="grayscale-img"><figure><?php echo $image02; ?></figure></div>
							    	<?php } else { ?>
										<p>There is no featured image for this module!</p>
									<?php } ?>
									<?php echo $title02; ?>
								</a>
								<?php if (!empty($textarea02)) { echo '<span class="description">' . $textarea02 . '</span>'; } ?>
							</div><!-- END #card-item-2 -->
						<!-- END OF SPECIAL 2 -->
						<?php } ?>

						<?php if (!empty($title03)) { ?>
							<!-- BEGIN SPECIAL 3 -->
							<div id="card-item-3" class="card-item" aria-label="card-item-3 module-page-section">
								<a href="<?php echo $link03; ?>" title="<?php echo $alt03; ?>">
									<?php if (!empty($image03id)) { ?>
										<div class="grayscale-img"><figure><?php echo $image03; ?></figure></div>
									<?php } else { ?>
										<p>There is no featured image for this module!</p>
									<?php } ?>
									<?php echo $title03; ?>
								</a>
								<?php if (!empty($textarea03)) { echo '<span class="description">' . $textarea03 . '</span>'; } ?>
							</div><!-- END #card-item-3 -->
							<!-- END OF SPECIAL 3 -->
						<?php } ?>

						<?php if ( $homepagecount == 'count4' ) { ?>
							<?php if (!empty($title04)) { ?>
								<!-- BEGIN SPECIAL 4 -->
								<div id="card-item-4" class="card-item" aria-label="card-item-4 module-page-section">
									<a href="<?php echo $link04; ?>" title="<?php echo $alt04; ?>">
										<?php if (!empty($image04id)) { ?>
											<div class="grayscale-img"><figure><?php echo $image04; ?></figure></div>
										<?php } else { ?>
											<p>There is no featured image for this module!</p>
										<?php } ?>
										<?php echo $title04; ?>
									</a>
									<?php if (!empty($textarea04)) { echo '<span class="description">' . $textarea04 . '</span>'; } ?>
								</div><!-- END #card-item-4 -->
								<!-- END OF SPECIAL 4 -->
							<?php } ?>
						<?php } ?>

					</div><!-- END .cards-class -->


    		</div><!-- END .container -->
		</div><!-- END #module-page-section -->
				<?php }	?>

				  <?php if (!empty($cf[ '_homepage_banner_body' ][0])) {
  				  $banner_body = $cf[ '_homepage_banner_body' ][0];

  				  if (!empty($cf['_homepage_banner_image'][0])) {
    				  $bannerimage_src = wp_get_attachment_url($cf['_homepage_banner_image'][0]);
    				  $bannerimage = 'background-image:url(' . $bannerimage_src . ');';
    				}
    				if (isset($cf['_homepage_banner_color'][0])) {
      				$banner_bg_color = 'background-color:' . $cf['_homepage_banner_color'][0] . ';';
      		  }
    				if (isset($cf['_homepage_banner_textcolor'][0])) {
      				$banner_text_color = 'color:' . $cf['_homepage_banner_textcolor'][0] . ';';
      		  }
				  ?>


				<!-- BEGIN SPECIAL 5 -->
				<div id="homepage-banner-section" class="container-fluid homepage-banner-section" role="complementary" style="<?php if (!empty($banner_bg_color)) { echo $banner_bg_color; } if (!empty($banner_text_color)) { echo $banner_text_color; } if (!empty($bannerimage)) { echo $bannerimage; } ?>" aria-label="homepage-banner-section module-page-section">
					<div class="container">
						<?php echo apply_filters( 'the_content', $cf['_homepage_banner_body'][0] );?>
					</div><!-- END .container -->
				</div><!-- END #homepage-banner-section -->
				<!-- END OF SPECIAL 5 -->
				<?php } ?>
		<!-- END OF SPECIAL SECTION -->
