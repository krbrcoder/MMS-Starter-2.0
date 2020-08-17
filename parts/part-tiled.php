    					<?php $cf = get_post_custom($post->ID); ?>
    					  <?php $columnscount = $cf['_tiledoptions_colspan'][0];
      					  if ($columnscount == 'col2') {
        					  $columns = 'col2';
      					  }
      					  elseif ($columnscount == 'col3') {
        					  $columns = 'col3';
      					  } else {
        					  $columns = 'col4';
      					  }
    					  ?>
      					  <?php $tileditems = unserialize($cf['_staff'][0]);
        					  if (!empty($tileditems)) {?>
          					<div class="tiled-listing">
          					  <ul class="<?php echo $columns; ?>">
          					  <?php foreach ($tileditems as $tileditem) {
            					  $tileditemid = $tileditem;
          					  ?>
          							<li>
          								<?php if (!empty($tileditemid['_image'])) {
                					  $imageid = $tileditemid['_image'];
                					  $image = wp_get_attachment_image($imageid, 'medium img-fluid' );

                					  if (!empty($tileditemid['_link'])) {
                  					  echo '<span class="img-area"><a href="' . $tileditemid['_link'] . '">' . $image . '</a></span>';
                					  } else {
                  					  echo '<span class="img-area">' . $image . '</span>';
                            }
                          } ?>

                          <?php if (isset($tileditemid['_title'])) {
                            $title = $tileditemid['_title'];
                          }

              					  if (!empty($tileditemid['_link'])) { echo '<h3><a href="' . $tileditemid['_link'] . '" title="' . $title .'">' . $title . ' <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
</a></h3>';
              					  } else if (!empty($title)) { ?>
                            <span class="h3"><?php echo $title; ?></span>
              					  <?php } ?>
              					  <?php
                					  if (!empty($tileditem['_body'])) {
                  					  $body = apply_filters('the_content', $tileditem['_body']);
                              echo $body;
                					  } ?>
            							</li>
                      <?php } // END FOREACH ?>
                		  </ul>
                		</div>
                  <?php } ?>