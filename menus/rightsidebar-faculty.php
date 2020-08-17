              <?php $cf = get_post_custom($post->ID);
				if (isset($cf['_facultypagev2div'][0])) {
					$facultylisting = unserialize($cf['_facultypagev2div'][0]);

					foreach ($facultylisting as $facultyset) {

						$label = $facultyset['_label'];
						$label_str_replace = str_replace(array(' ' , ','), '-', $label);
						$label_str_replace = strtolower($label_str_replace);
						$label_id = sanitize_title_with_dashes($label_str_replace);
						$faculty = $facultyset['_faculty'];

  					?>
          		<?php if (!empty($label)) { ?>
        				<div class="single-post-meta" id="<?php echo $labelid; ?>"  aria-label="<?php echo $labelid; ?>">
              		<span class="h6 section-header"><?php echo $label; ?></span>
              <?php } else { ?>
        				<div class="single-post-meta" id="related-faculty">
              		<span class="h6 section-header">Related Faculty</span>
          		<?php } ?>
            				<ul class="nav secondarynav related-external">
    									<?php	foreach ($faculty as $facultyid) { ?>
                        <li><a target="_self" href="<?php echo get_the_permalink($facultyid); ?>"><?php echo get_the_title($facultyid); ?></a></li>
                      <?php } ?>
                    </ul>
      		    	</div>
      		    	<?php } ?>
      		    	<?php } ?>