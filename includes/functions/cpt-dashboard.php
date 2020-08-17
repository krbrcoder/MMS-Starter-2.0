	

    <?php
    // Add Custom Post Type to WP-ADMIN Right Now Widget
    // Ref Link: http://wpsnipp.com/index.php/functions-php/include-custom-post-types-in-right-now-admin-dashboard-widget/
    // http://wordpress.org/support/topic/dashboard-at-a-glance-custom-post-types
    // http://halfelf.org/2012/my-custom-posttypes-live-in-mu/
    function vm_right_now_content_table_end() {
        $args = array(
            'public' => true ,
            '_builtin' => false
        );
        $output = 'object';
        $operator = 'and';
        $post_types = get_post_types( $args , $output , $operator );
        foreach( $post_types as $post_type ) {
            $num_posts = wp_count_posts( $post_type->name );
            $num = number_format_i18n( $num_posts->publish );
            $text = _n( $post_type->labels->name, $post_type->labels->name , intval( $num_posts->publish ) );
            if ( current_user_can( 'edit_posts' ) ) {
                $cpt_name = $post_type->name;
            }
            echo '<li class="post-count"><tr><a href="edit.php?post_type='.$cpt_name.'"><td class="first b b-' . $post_type->name . '"></td>' . $num . '&nbsp;<td class="t ' . $post_type->name . '">' . $text . '</td></a></tr></li>';
        }
        $taxonomies = get_taxonomies( $args , $output , $operator );
        foreach( $taxonomies as $taxonomy ) {
            $num_terms  = wp_count_terms( $taxonomy->name );
            $num = number_format_i18n( $num_terms );
            $text = _n( $taxonomy->labels->name, $taxonomy->labels->name , intval( $num_terms ));
            if ( current_user_can( 'manage_categories' ) ) {
                $cpt_tax = $taxonomy->name;
            }
            echo '<li class="post-count"><tr><a href="edit-tags.php?taxonomy='.$cpt_tax.'"><td class="first b b-' . $taxonomy->name . '"></td>' . $num . '&nbsp;<td class="t ' . $taxonomy->name . '">' . $text . '</td></a></tr></li>';
        }
    }
    add_action( 'dashboard_glance_items' , 'vm_right_now_content_table_end' );

