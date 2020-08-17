                    <?php 
                      $cf = get_post_custom($post->ID);

                      $msg = $cf[ '_homepage_deanmsg' ][0];
                      $mtitle = get_the_title($msg);
                      $mcontentpost_get = get_post($msg);
                      $mcontent = $mcontentpost_get->post_content;
                      $mlink = get_the_permalink($msg);
                      $mthumbnail = get_the_post_thumbnail($msg, 'medium alignleft img-fluid' );
                    ?>

                        <h3><?php echo $mtitle; ?></h3>
                        <?php if (!empty($mthumbnail)) { echo $mthumbnail; } ?>
                        <p><?php echo wp_trim_words( $mcontent, 40, '...' ); ?>
                          <a href="<?php echo $mlink; ?>" title="read more about <?php echo $mtitle; ?>" class="readmore">Read More &raquo;</a>
                        </p>