<div id="page-part-section" class="partsection" role="complementary" aria-label="page-part-section">
  	<?php

    	$cf = get_post_custom($post->ID);

    		$sectionsunserialize = $cf['_sections'][0];
    		$sections = unserialize($sectionsunserialize);
        $count = 0;

    			foreach($sections as $section) {
      			// print_r($section);

            $count++;

    				$layout = $section['_layout'];

            if (!empty($section['_title'])) {
              $sectiontitle = $section['_title'];
        			$sectiontitleid_str_replace = str_replace(array(' ' , ','), '-', $sectiontitle);
        			$sectiontitleid_str_replace = strtolower($sectiontitleid_str_replace);
        			$sectiontitleid = sanitize_title_with_dashes($sectiontitleid_str_replace);
        		} else {
          		$sectiontitle = '';
          		$sectiontitleid = 'no-label-title';
        		}

            $sectionimage = $section['_bgimage'];
            $image_responsive = wp_get_attachment_image($sectionimage, 'full img-fluid');
            $image_url = wp_get_attachment_url($sectionimage);
            $image_alt = get_the_title($sectionimage);

    				$sectioncontent = apply_filters( 'the_content', $section['_content']);

    				switch ($layout) {

    			    case "":
    			    case "layout3": // NORMAL PAGE LAYOUT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' layout3">';
      					echo '<div class="container row">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout2": // LEFT IMAGE / RIGHT TEXT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' layout2">';
      					echo '<div class="col-md-3 col-xs-4">';
      					echo '<img src="' . $image_url . '" class="img-fluid" alt="' . $image_alt .'"/>';
      					echo '</div>';
      					echo '<div class="col-md-9 col-xs-8 row">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout9": // LEFT TEXT / RIGHT IMAGE
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' layout9">';
      					echo '<div class="col-md-9 col-xs-9 row">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '<div class="col-md-3 col-xs-3">';
      					echo '<img src="' . $image_url . '" class="img-fluid" alt="' . $image_alt .'"/>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout1": // FULL BACKGROUND
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' layout1" style="';
        				if (!empty($image_url)) {
      					  echo 'background-image: url(' . $image_url . ');height:400px;';
                }
                echo '">';
      					echo '<div class="row">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout4": // DARK GRAY LAYOUT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' bg-gray-dark text-white">';
      					echo '<div class="container">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout5": // DARK BLUE LAYOUT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' bg-primary-dark text-white">';
      					echo '<div class="container">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout6": // MCGOVERN BLUE LAYOUT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' bg-mmsblue text-white">';
      					echo '<div class="container">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout7": // LIGHT GRAY LAYOUT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' bg-hazy">';
      					echo '<div class="container">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout8": // LIGHT BEIGE LAYOUT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' bg-beige">';
      					echo '<div class="container">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    			    case "layout9": // PICTURE ON LEFT / BODY ON RIGHT
      					echo '<div id="' . $sectiontitleid . '" aria-label="' . $sectiontitleid . ' page-part-section"';
      					echo ' class="container';
            		if (isset($section['_width'])) {
              		if ( ($section['_width']) == 'full') {
                    echo '-fluid';
                  }
                }
                echo ' bg-beige module-section">';
      					echo '<div class="container">';
      					echo '<div class="col-md-12">';
      					if (!empty($sectiontitle)) {
        					echo '<h3>' . $sectiontitle . '</h3>';
      					}
      					echo $sectioncontent;
      					echo '</div>';
      					echo '</div>';
      					echo '</div>';
              break;
    				}

    			}
      ?>
</div>
